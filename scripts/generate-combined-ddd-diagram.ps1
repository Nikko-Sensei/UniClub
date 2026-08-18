Add-Type -AssemblyName System.Drawing

$root = Split-Path -Parent $PSScriptRoot
$outDir = Join-Path $root "docs"
$outFile = Join-Path $outDir "combined-club-event-ddd-class-diagram.png"

if (-not (Test-Path $outDir)) {
    New-Item -ItemType Directory -Path $outDir | Out-Null
}

$width = 2400
$height = 1700
$bitmap = New-Object System.Drawing.Bitmap $width, $height
$graphics = [System.Drawing.Graphics]::FromImage($bitmap)
$graphics.SmoothingMode = [System.Drawing.Drawing2D.SmoothingMode]::AntiAlias
$graphics.TextRenderingHint = [System.Drawing.Text.TextRenderingHint]::ClearTypeGridFit

$white = [System.Drawing.Brushes]::White
$black = [System.Drawing.Brushes]::Black
$lightLayer = New-Object System.Drawing.SolidBrush ([System.Drawing.Color]::FromArgb(250, 250, 250))
$lightHeader = New-Object System.Drawing.SolidBrush ([System.Drawing.Color]::FromArgb(235, 235, 235))
$domainFill = New-Object System.Drawing.SolidBrush ([System.Drawing.Color]::FromArgb(255, 255, 255))
$pen = New-Object System.Drawing.Pen ([System.Drawing.Color]::Black), 2
$thinPen = New-Object System.Drawing.Pen ([System.Drawing.Color]::Black), 1
$dashPen = New-Object System.Drawing.Pen ([System.Drawing.Color]::Black), 1.5
$dashPen.DashStyle = [System.Drawing.Drawing2D.DashStyle]::Dash

$titleFont = New-Object System.Drawing.Font "Arial", 28, ([System.Drawing.FontStyle]::Bold)
$layerFont = New-Object System.Drawing.Font "Arial", 18, ([System.Drawing.FontStyle]::Bold)
$classFont = New-Object System.Drawing.Font "Arial", 13, ([System.Drawing.FontStyle]::Bold)
$textFont = New-Object System.Drawing.Font "Arial", 11
$smallFont = New-Object System.Drawing.Font "Arial", 10

$graphics.FillRectangle($white, 0, 0, $width, $height)

function Draw-CenteredText {
    param($G, [string]$Text, [System.Drawing.Font]$Font, $Brush, [int]$X, [int]$Y, [int]$W, [int]$H)
    $format = New-Object System.Drawing.StringFormat
    $format.Alignment = [System.Drawing.StringAlignment]::Center
    $format.LineAlignment = [System.Drawing.StringAlignment]::Center
    $G.DrawString($Text, $Font, $Brush, (New-Object System.Drawing.RectangleF $X, $Y, $W, $H), $format)
}

function Draw-Text {
    param($G, [string]$Text, [System.Drawing.Font]$Font, $Brush, [int]$X, [int]$Y, [int]$W, [int]$H)
    $format = New-Object System.Drawing.StringFormat
    $format.Alignment = [System.Drawing.StringAlignment]::Near
    $format.LineAlignment = [System.Drawing.StringAlignment]::Near
    $G.DrawString($Text, $Font, $Brush, (New-Object System.Drawing.RectangleF $X, $Y, $W, $H), $format)
}

function Draw-Layer {
    param($G, [string]$Title, [int]$X, [int]$Y, [int]$W, [int]$H)
    $G.FillRectangle($script:lightLayer, $X, $Y, $W, $H)
    $G.DrawRectangle($script:pen, $X, $Y, $W, $H)
    $G.FillRectangle($script:lightHeader, $X, $Y, $W, 40)
    $G.DrawRectangle($script:thinPen, $X, $Y, $W, 40)
    Draw-CenteredText $G $Title $script:layerFont $script:black $X $Y $W 40
}

function Draw-ClassBox {
    param($G, [string]$Title, [string[]]$Fields, [string[]]$Methods, [int]$X, [int]$Y, [int]$W, [int]$H)
    $G.FillRectangle($script:domainFill, $X, $Y, $W, $H)
    $G.DrawRectangle($script:thinPen, $X, $Y, $W, $H)
    $titleH = 30
    Draw-CenteredText $G $Title $script:classFont $script:black $X $Y $W $titleH
    $G.DrawLine($script:thinPen, $X, ($Y + $titleH), ($X + $W), ($Y + $titleH))

    $fieldY = $Y + $titleH + 7
    foreach ($field in $Fields) {
        Draw-Text $G $field $script:textFont $script:black ($X + 10) $fieldY ($W - 20) 17
        $fieldY += 17
    }

    if ($Methods.Count -gt 0) {
        $lineY = [Math]::Max(($Y + $titleH + 90), ($fieldY + 3))
        if ($lineY -lt ($Y + $H - 60)) {
            $G.DrawLine($script:thinPen, $X, $lineY, ($X + $W), $lineY)
            $methodY = $lineY + 7
        } else {
            $methodY = $fieldY + 5
        }

        foreach ($method in $Methods) {
            if ($methodY -lt ($Y + $H - 16)) {
                Draw-Text $G $method $script:textFont $script:black ($X + 10) $methodY ($W - 20) 17
                $methodY += 17
            }
        }
    }
}

function Draw-Arrow {
    param($G, [int]$X1, [int]$Y1, [int]$X2, [int]$Y2, [string]$Label = "", [bool]$Dashed = $false)
    $p = if ($Dashed) { $script:dashPen } else { $script:thinPen }
    $G.DrawLine($p, $X1, $Y1, $X2, $Y2)

    $angle = [Math]::Atan2(($Y2 - $Y1), ($X2 - $X1))
    $arrowLength = 16
    $arrowAngle = [Math]::PI / 7
    $xA = $X2 - $arrowLength * [Math]::Cos($angle - $arrowAngle)
    $yA = $Y2 - $arrowLength * [Math]::Sin($angle - $arrowAngle)
    $xB = $X2 - $arrowLength * [Math]::Cos($angle + $arrowAngle)
    $yB = $Y2 - $arrowLength * [Math]::Sin($angle + $arrowAngle)
    $G.DrawLine($p, $X2, $Y2, [int]$xA, [int]$yA)
    $G.DrawLine($p, $X2, $Y2, [int]$xB, [int]$yB)

    if ($Label -ne "") {
        $midX = [int](($X1 + $X2) / 2)
        $midY = [int](($Y1 + $Y2) / 2)
        $G.FillRectangle($script:white, ($midX - 55), ($midY - 14), 110, 24)
        Draw-CenteredText $G $Label $script:smallFont $script:black ($midX - 55) ($midY - 14) 110 24
    }
}

Draw-CenteredText $graphics "UniClub DDD Class Diagram: Club, Membership, Event, Attendance, Feedback, Certificate" $titleFont $black 120 25 2160 55

Draw-Layer $graphics "Presentation Layer" 70 110 2260 330
Draw-Layer $graphics "Application Layer" 70 485 2260 365
Draw-Layer $graphics "Domain Layer" 70 900 1350 710
Draw-Layer $graphics "Infrastructure Layer" 1470 900 860 710

Draw-ClassBox $graphics "Club Controllers" @("-ClubService", "-MembershipService", "-MasterService") @("+index()", "+show(id)", "+store()", "+update(id)", "+delete()", "+join(id)") 120 180 340 210
Draw-ClassBox $graphics "Membership Controllers" @("-MembershipService") @("+join(clubId)", "+myClubs()", "+members(clubId)", "+approve(id)", "+reject(id)", "+updateRole()") 500 180 360 210
Draw-ClassBox $graphics "Event Controllers" @("-EventService", "-ClubService", "-AttendanceService", "-CertificateService") @("+index()", "+show(id)", "+register(id)", "+cancelRegistration(id)", "+registrations(id)") 900 180 390 210
Draw-ClassBox $graphics "Attendance / Feedback / Certificate Controllers" @("-EventAttendanceService", "-EventFeedbackService", "-EventCertificateService") @("+history()", "+store(eventId)", "+eventFeedback(eventId)", "+generate(eventId)", "+generateAll(eventId)", "+download(id)") 1330 180 540 210
Draw-ClassBox $graphics "Views" @("Club Views", "Membership Views", "Event Views", "Attendance Views", "Feedback Views", "Certificate Views") @("+render pages", "+show forms", "+display lists") 1910 180 360 210

Draw-ClassBox $graphics "ClubService" @("-ClubRepositoryInterface", "-ClubValidator", "-ImageUploadService", "-AuditLogger") @("+create()", "+update()", "+delete()", "+getClub()", "+getClubs()", "+getMembers()") 120 565 330 230
Draw-ClassBox $graphics "MembershipService" @("-MembershipRepositoryInterface") @("+join()", "+leave()", "+approve()", "+reject()", "+updateRole()", "+getMyClubs()") 485 565 330 230
Draw-ClassBox $graphics "EventService" @("-EventRepositoryInterface", "-ImageUploadService", "-NotificationService", "-AuditLogger") @("+create()", "+update()", "+delete()", "+register()", "+cancelRegistration()", "+approveRegistration()") 850 565 350 230
Draw-ClassBox $graphics "EventAttendanceService" @("-AttendanceRepositoryInterface", "-EventService") @("+getEventAttendance()", "+store()", "+update()", "+history()") 1235 565 330 230
Draw-ClassBox $graphics "EventFeedbackService" @("-FeedbackRepositoryInterface", "-EventRepositoryInterface") @("+create()", "+getByEvent()", "+getAll()", "+delete()") 1600 565 330 230
Draw-ClassBox $graphics "EventCertificateService" @("-CertificateRepositoryInterface", "-EventService", "-AttendanceService", "-UserService") @("+getCertificates()", "+generate()", "+generateAll()", "+download()") 1965 565 330 230

Draw-ClassBox $graphics "Club" @("-id:int", "-categoryId:int", "-name:string", "-membershipFee:float", "-memberCount:int", "-status:string") @("+getId()", "+getName()", "+getMembershipFee()", "+isActive()") 120 980 300 210
Draw-ClassBox $graphics "Membership" @("-id:int", "-clubId:int", "-userId:int", "-roleId:int", "-status:string", "-joinedAt:string") @("+getClubId()", "+getUserId()", "+getStatus()") 455 980 300 210
Draw-ClassBox $graphics "Event" @("-id:int", "-clubId:int", "-title:string", "-eventDate:string", "-location:string", "-capacity:int", "-status:string") @("+getClubId()", "+getTitle()", "+getStatus()") 790 980 300 210
Draw-ClassBox $graphics "EventAttendance" @("-id:int", "-eventId:int", "-userId:int", "-status:string", "-checkedInAt:string") @("+getEventId()", "+getUserId()", "+getStatus()") 1125 980 250 210

Draw-ClassBox $graphics "EventFeedback" @("-id:int", "-eventId:int", "-userId:int", "-rating:int", "-comment:string") @("+getEventId()", "+getUserId()", "+getRating()") 120 1245 300 200
Draw-ClassBox $graphics "EventCertificate" @("-id:int", "-eventId:int", "-userId:int", "-certificateNumber:string", "-filePath:string", "-issuedAt:string") @("+getCertificateNumber()", "+getFilePath()") 455 1245 300 200
Draw-ClassBox $graphics "Repository Interfaces" @("ClubRepositoryInterface", "MembershipRepositoryInterface", "EventRepositoryInterface", "EventAttendanceRepositoryInterface", "EventFeedbackRepositoryInterface", "EventCertificateRepositoryInterface") @("+create(entity)", "+findById(id)", "+findAll()", "+update()", "+delete()") 790 1245 585 300

Draw-ClassBox $graphics "Concrete Repositories" @("ClubRepository", "MembershipRepository", "EventRepository", "EventAttendanceRepository", "EventFeedbackRepository", "EventCertificateRepository") @("+create()", "+findById()", "+findAll()", "+mapToEntity()") 1520 980 360 260
Draw-ClassBox $graphics "Shared Infrastructure" @("Database", "BaseRepository", "ImageUploadService", "NotificationService", "AuditLogger", "CertificatePdfService") @("+getConnection()", "+upload()", "+notify()", "+log()", "+generatePdf()") 1930 980 350 260
Draw-ClassBox $graphics "Stored Procedures / Tables" @("clubs", "club_memberships", "events", "event_attendance", "event_feedback", "event_certificates") @("CALL sp_club_*", "CALL sp_event_*", "SELECT / INSERT / UPDATE") 1670 1310 460 220

Draw-Arrow $graphics 290 390 285 565 "calls"
Draw-Arrow $graphics 680 390 650 565 "calls"
Draw-Arrow $graphics 1095 390 1025 565 "calls"
Draw-Arrow $graphics 1585 390 1410 565 "calls"
Draw-Arrow $graphics 2090 390 2095 565 "uses"

Draw-Arrow $graphics 285 795 265 980 "uses"
Draw-Arrow $graphics 650 795 605 980 "uses"
Draw-Arrow $graphics 1025 795 940 980 "uses"
Draw-Arrow $graphics 1400 795 1245 980 "uses"
Draw-Arrow $graphics 1765 795 270 1245 "uses"
Draw-Arrow $graphics 2130 795 605 1245 "uses"

Draw-Arrow $graphics 450 680 790 1395 "depends"
Draw-Arrow $graphics 815 680 920 1395 "depends"
Draw-Arrow $graphics 1200 680 1040 1395 "depends"
Draw-Arrow $graphics 1565 680 1160 1395 "depends"
Draw-Arrow $graphics 1930 680 1270 1395 "depends"

Draw-Arrow $graphics 1375 1395 1520 1110 "implements" $true
Draw-Arrow $graphics 1880 1110 1930 1110 "uses"
Draw-Arrow $graphics 1760 1240 1880 1310 "persists"

Draw-Arrow $graphics 420 1085 455 1085 "1..*" 
Draw-Arrow $graphics 420 1045 790 1045 "hosts"
Draw-Arrow $graphics 1090 1045 1125 1045 "records"
Draw-Arrow $graphics 940 1190 270 1245 "feedback"
Draw-Arrow $graphics 940 1190 605 1245 "certificate"

$note = "DDD dependency rule: Presentation calls Application. Application uses Domain entities and repository interfaces. Infrastructure implements repository interfaces and talks to the database."
Draw-Text $graphics $note $textFont $black 90 1630 2200 40

$bitmap.Save($outFile, [System.Drawing.Imaging.ImageFormat]::Png)
$graphics.Dispose()
$bitmap.Dispose()

Write-Output $outFile
