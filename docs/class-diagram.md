# UniClub DDD Class Diagram

## Full DDD Structure For All Modules

This diagram is the DDD version of an MVC class diagram. Instead of `Model`, `View`, and `Controller`, the project is grouped by DDD layers:

- `Presentation`: controllers and views
- `Application`: services, validators, and DTOs
- `Domain`: entities, value objects, repository interfaces, and domain exceptions
- `Infrastructure`: concrete repositories, database access, mail, uploads, and persistence details

```mermaid
classDiagram
    direction TB

    namespace Presentation {
        class AuthPresentation {
            AuthController
            PasswordResetController
            Auth Views
        }

        class UserPresentation {
            UserController
            ProfileController
            Profile Views
        }

        class ClubPresentation {
            AdminClubController
            UserClubController
            Club Views
        }

        class MembershipPresentation {
            MembershipController
            AdminMembershipController
            Membership Views
        }

        class EventPresentation {
            EventController
            AdminEventController
            Event Views
        }

        class EventAttendancePresentation {
            EventAttendanceController
            AdminEventAttendanceController
            Attendance Views
        }

        class EventFeedbackPresentation {
            EventFeedbackController
            AdminEventFeedbackController
            Feedback Views
        }

        class EventCertificatePresentation {
            EventCertificateController
            AdminEventCertificateController
            Certificate Views
        }

        class PaymentPresentation {
            StudentPaymentController
            AdminPaymentController
            Payment Views
        }

        class PaymentAccountPresentation {
            AdminPaymentAccountController
            Payment Account Views
        }

        class AnnouncementPresentation {
            AnnouncementController
            AdminAnnouncementController
            Announcement Views
        }

        class ContactPresentation {
            ContactController
            AdminContactController
            Contact Views
        }

        class NotificationPresentation {
            NotificationController
            Notification Views
        }

        class DashboardPresentation {
            DashboardController
            Dashboard Views
        }

        class UserManagementPresentation {
            UserManagementController
            User Management Views
        }

        class RBACPresentation {
            RolePermissionController
            RBAC Views
        }

        class SettingsPresentation {
            GeneralSettingController
            SecuritySettingController
            Settings Views
        }

        class AuditPresentation {
            AuditController
            Audit Views
        }

        class HomePresentation {
            HomeController
            Home Views
        }
    }

    namespace Application {
        class AuthApplication {
            AuthService
            PasswordResetService
            PasswordPolicyService
            LoginProtectionService
            RegisterValidator
            LoginValidator
            ForgotPasswordValidator
            VerifyOtpValidator
            ResetPasswordValidator
            LoginDTO
            RegisterDTO
        }

        class UserApplication {
            UserService
            UpdateProfileValidator
            ChangePasswordValidator
            UserDTO
            UpdateProfileDTO
        }

        class ClubApplication {
            ClubService
            ClubValidator
            ClubDTO
        }

        class MembershipApplication {
            MembershipService
        }

        class EventApplication {
            EventService
            EventValidator
        }

        class EventAttendanceApplication {
            EventAttendanceService
        }

        class EventFeedbackApplication {
            EventFeedbackService
        }

        class EventCertificateApplication {
            EventCertificateService
            CertificatePdfService
            CertificateGenerator
        }

        class PaymentApplication {
            PaymentService
            PaymentValidator
        }

        class PaymentAccountApplication {
            PaymentAccountService
            PaymentAccountValidator
        }

        class AnnouncementApplication {
            AnnouncementService
        }

        class ContactApplication {
            ContactService
        }

        class NotificationApplication {
            NotificationService
        }

        class DashboardApplication {
            DashboardService
            DashboardDTO
        }

        class UserManagementApplication {
            UserManagementService
            UserManagementValidator
            ManagedUserDTO
            UserFilterDTO
        }

        class RBACApplication {
            PermissionService
            RolePermissionService
        }

        class SettingsApplication {
            GeneralSettingService
            SecuritySettingService
        }

        class AuditApplication {
            AuditService
        }

        class HomeApplication {
            HomeService
        }

        class MasterApplication {
            MasterService
        }
    }

    namespace Domain {
        class AuthDomain {
            PasswordResetOtp
            Email
            Password
            PasswordPolicy
            PhoneNumber
            StudentId
            UserName
            Auth UserRepositoryInterface
            PasswordResetRepositoryInterface
            LoginAttemptRepositoryInterface
            Auth Exceptions
        }

        class UserDomain {
            User
            UserRepositoryInterface
        }

        class ClubDomain {
            Club
            ClubRepositoryInterface
            ClubException
            ClubNotFoundException
            DuplicateClubException
        }

        class MembershipDomain {
            Membership
            MembershipRepositoryInterface
        }

        class EventDomain {
            Event
            EventRepositoryInterface
            EventNotFoundException
            EventRegistrationException
        }

        class EventAttendanceDomain {
            EventAttendance
            EventAttendanceRepositoryInterface
        }

        class EventFeedbackDomain {
            EventFeedback
            EventFeedbackRepositoryInterface
            FeedbackNotFoundException
        }

        class EventCertificateDomain {
            EventCertificate
            EventCertificateRepositoryInterface
        }

        class PaymentDomain {
            Payment
            PaymentRepositoryInterface
        }

        class PaymentAccountDomain {
            PaymentAccount
            PaymentAccountRepositoryInterface
        }

        class AnnouncementDomain {
            Announcement
            AnnouncementRepositoryInterface
        }

        class ContactDomain {
            ContactMessage
            ContactRepositoryInterface
        }

        class NotificationDomain {
            Notification
            NotificationRepositoryInterface
        }

        class DashboardDomain {
            DashboardRepositoryInterface
        }

        class UserManagementDomain {
            ManagedUser
            UserManagementRepositoryInterface
        }

        class RBACDomain {
            Role
            Permission
            RoleRepositoryInterface
            PermissionRepositoryInterface
            RolePermissionRepositoryInterface
        }

        class SettingsDomain {
            GeneralSetting
            GeneralSettingRepositoryInterface
            SecuritySettingRepositoryInterface
        }

        class AuditDomain {
            AuditRepositoryInterface
        }

        class HomeDomain {
            HomeRepositoryInterface
        }

        class MasterDomain {
            ClubCategory
            MasterRepositoryInterface
        }
    }

    namespace Infrastructure {
        class AuthInfrastructure {
            PasswordResetRepository
            LoginAttemptRepository
        }

        class UserInfrastructure {
            UserRepository
        }

        class ClubInfrastructure {
            ClubRepository
        }

        class MembershipInfrastructure {
            MembershipRepository
        }

        class EventInfrastructure {
            EventRepository
        }

        class EventAttendanceInfrastructure {
            EventAttendanceRepository
        }

        class EventFeedbackInfrastructure {
            EventFeedbackRepository
        }

        class EventCertificateInfrastructure {
            EventCertificateRepository
        }

        class PaymentInfrastructure {
            PaymentRepository
        }

        class PaymentAccountInfrastructure {
            PaymentAccountRepository
        }

        class AnnouncementInfrastructure {
            AnnouncementRepository
        }

        class ContactInfrastructure {
            ContactRepository
        }

        class NotificationInfrastructure {
            NotificationRepository
        }

        class DashboardInfrastructure {
            DashboardRepository
        }

        class UserManagementInfrastructure {
            UserManagementRepository
        }

        class RBACInfrastructure {
            RoleRepository
            PermissionRepository
            RolePermissionRepository
            PermissionLoader
        }

        class SettingsInfrastructure {
            GeneralSettingRepository
            SecuritySettingRepository
        }

        class AuditInfrastructure {
            AuditRepository
        }

        class HomeInfrastructure {
            HomeRepository
        }

        class MasterInfrastructure {
            MasterRepository
        }

        class SharedInfrastructure {
            Database
            BaseRepository
            Mailer
            EmailService
            ImageUploadService
            AuditLogger
        }
    }

    AuthPresentation --> AuthApplication
    UserPresentation --> UserApplication
    ClubPresentation --> ClubApplication
    MembershipPresentation --> MembershipApplication
    EventPresentation --> EventApplication
    EventAttendancePresentation --> EventAttendanceApplication
    EventFeedbackPresentation --> EventFeedbackApplication
    EventCertificatePresentation --> EventCertificateApplication
    PaymentPresentation --> PaymentApplication
    PaymentAccountPresentation --> PaymentAccountApplication
    AnnouncementPresentation --> AnnouncementApplication
    ContactPresentation --> ContactApplication
    NotificationPresentation --> NotificationApplication
    DashboardPresentation --> DashboardApplication
    UserManagementPresentation --> UserManagementApplication
    RBACPresentation --> RBACApplication
    SettingsPresentation --> SettingsApplication
    AuditPresentation --> AuditApplication
    HomePresentation --> HomeApplication

    AuthApplication --> AuthDomain
    UserApplication --> UserDomain
    ClubApplication --> ClubDomain
    MembershipApplication --> MembershipDomain
    MembershipApplication --> ClubDomain
    EventApplication --> EventDomain
    EventApplication --> ClubDomain
    EventAttendanceApplication --> EventAttendanceDomain
    EventAttendanceApplication --> EventDomain
    EventFeedbackApplication --> EventFeedbackDomain
    EventFeedbackApplication --> EventDomain
    EventCertificateApplication --> EventCertificateDomain
    EventCertificateApplication --> EventDomain
    EventCertificateApplication --> EventAttendanceDomain
    PaymentApplication --> PaymentDomain
    PaymentApplication --> PaymentAccountDomain
    AnnouncementApplication --> AnnouncementDomain
    AnnouncementApplication --> NotificationDomain
    ContactApplication --> ContactDomain
    NotificationApplication --> NotificationDomain
    DashboardApplication --> DashboardDomain
    UserManagementApplication --> UserManagementDomain
    RBACApplication --> RBACDomain
    SettingsApplication --> SettingsDomain
    AuditApplication --> AuditDomain
    HomeApplication --> HomeDomain
    MasterApplication --> MasterDomain

    AuthInfrastructure ..|> AuthDomain
    UserInfrastructure ..|> UserDomain
    ClubInfrastructure ..|> ClubDomain
    MembershipInfrastructure ..|> MembershipDomain
    EventInfrastructure ..|> EventDomain
    EventAttendanceInfrastructure ..|> EventAttendanceDomain
    EventFeedbackInfrastructure ..|> EventFeedbackDomain
    EventCertificateInfrastructure ..|> EventCertificateDomain
    PaymentInfrastructure ..|> PaymentDomain
    PaymentAccountInfrastructure ..|> PaymentAccountDomain
    AnnouncementInfrastructure ..|> AnnouncementDomain
    ContactInfrastructure ..|> ContactDomain
    NotificationInfrastructure ..|> NotificationDomain
    DashboardInfrastructure ..|> DashboardDomain
    UserManagementInfrastructure ..|> UserManagementDomain
    RBACInfrastructure ..|> RBACDomain
    SettingsInfrastructure ..|> SettingsDomain
    AuditInfrastructure ..|> AuditDomain
    HomeInfrastructure ..|> HomeDomain
    MasterInfrastructure ..|> MasterDomain

    AuthInfrastructure --> SharedInfrastructure
    UserInfrastructure --> SharedInfrastructure
    ClubInfrastructure --> SharedInfrastructure
    MembershipInfrastructure --> SharedInfrastructure
    EventInfrastructure --> SharedInfrastructure
    PaymentInfrastructure --> SharedInfrastructure
```

## Compact DDD Class Diagram Like MVC Sample

```mermaid
classDiagram
    direction TB

    namespace Presentation {
        class Controllers {
            AuthController
            PasswordResetController
            ProfileController
            AdminClubController
            UserClubController
            MembershipController
            AdminMembershipController
            EventController
            AdminEventController
            StudentPaymentController
            AdminPaymentController
            AnnouncementController
            ContactController
            DashboardController
            RolePermissionController
        }

        class Views {
            Auth Views
            Profile Views
            Club Views
            Membership Views
            Event Views
            Payment Views
            Admin Views
            Shared Layouts
        }
    }

    namespace Application {
        class Services {
            AuthService
            PasswordResetService
            UserService
            ClubService
            MembershipService
            EventService
            EventAttendanceService
            EventFeedbackService
            EventCertificateService
            PaymentService
            AnnouncementService
            ContactService
            NotificationService
            DashboardService
            PermissionService
            RolePermissionService
            MasterService
        }

        class Validators {
            RegisterValidator
            LoginValidator
            ClubValidator
            EventValidator
            PaymentValidator
            UserManagementValidator
            PaymentAccountValidator
        }

        class DTOs {
            LoginDTO
            RegisterDTO
            UserDTO
            ClubDTO
            ManagedUserDTO
            DashboardDTO
        }
    }

    namespace Domain {
        class Entities {
            User
            PasswordResetOtp
            Club
            Membership
            Event
            EventAttendance
            EventFeedback
            EventCertificate
            Payment
            PaymentAccount
            Announcement
            ContactMessage
            Notification
            ManagedUser
            Role
            Permission
            GeneralSetting
            ClubCategory
        }

        class ValueObjects {
            Email
            Password
            PasswordPolicy
            PhoneNumber
            StudentId
            UserName
        }

        class RepositoryInterfaces {
            UserRepositoryInterface
            ClubRepositoryInterface
            MembershipRepositoryInterface
            EventRepositoryInterface
            EventAttendanceRepositoryInterface
            EventFeedbackRepositoryInterface
            EventCertificateRepositoryInterface
            PaymentRepositoryInterface
            AnnouncementRepositoryInterface
            ContactRepositoryInterface
            NotificationRepositoryInterface
            RoleRepositoryInterface
            PermissionRepositoryInterface
        }
    }

    namespace Infrastructure {
        class Repositories {
            UserRepository
            PasswordResetRepository
            ClubRepository
            MembershipRepository
            EventRepository
            EventAttendanceRepository
            EventFeedbackRepository
            EventCertificateRepository
            PaymentRepository
            AnnouncementRepository
            ContactRepository
            NotificationRepository
            RoleRepository
            PermissionRepository
        }

        class SharedServices {
            Database
            BaseRepository
            ImageUploadService
            Mailer
            EmailService
            AuditLogger
            PermissionLoader
        }
    }

    Controllers --> Services : calls
    Controllers --> Views : renders
    Services --> Validators : validates input
    Services --> DTOs : accepts/transfers data
    Services --> Entities : creates/uses
    Services --> ValueObjects : validates domain values
    Services --> RepositoryInterfaces : depends on contracts
    Repositories ..|> RepositoryInterfaces : implements
    Repositories --> Entities : maps database rows
    Repositories --> SharedServices : uses DB/services
```

## Club, Membership, Event, Attendance, Feedback, Certificate Combined DDD Diagram

```mermaid
classDiagram
    direction TB

    namespace Presentation {
        class AdminClubController {
            -ClubService clubService
            -MasterService masterService
            +index()
            +show(id)
            +create()
            +store()
            +edit(id)
            +update(id)
            +delete(id)
        }

        class UserClubController {
            -ClubService clubService
            -MembershipService membershipService
            +index()
            +show(id)
            +join(id)
        }

        class MembershipController {
            -MembershipService membershipService
            +join(clubId)
            +myClubs()
            +leave(id)
        }

        class AdminMembershipController {
            -MembershipService membershipService
            +index()
            +members(clubId)
            +editRole(id)
            +updateRole()
            +approve(id)
            +reject(id)
            +remove(id)
        }

        class EventController {
            -EventService eventService
            -ClubService clubService
            -EventAttendanceService attendanceService
            -EventCertificateService certificateService
            +index()
            +show(id)
            +register(id)
            +cancelRegistration(id)
        }

        class AdminEventController {
            -EventService eventService
            -ClubService clubService
            -EventAttendanceService attendanceService
            +index()
            +create()
            +store()
            +edit(id)
            +update(id)
            +delete(id)
            +registrations(id)
            +approveRegistration(id)
            +rejectRegistration(id)
        }

        class EventAttendanceController {
            -EventAttendanceService attendanceService
            +history()
        }

        class AdminEventAttendanceController {
            -EventAttendanceService attendanceService
            -EventService eventService
            +index(eventId)
            +store(eventId)
            +update(eventId)
        }

        class EventFeedbackController {
            -EventFeedbackService feedbackService
            +create(eventId)
            +store(eventId)
        }

        class AdminEventFeedbackController {
            -EventFeedbackService feedbackService
            -EventService eventService
            +index()
            +eventFeedback(eventId)
            +delete(id)
        }

        class EventCertificateController {
            -EventCertificateService certificateService
            +index()
            +download(id)
        }

        class AdminEventCertificateController {
            -EventCertificateService certificateService
            -EventService eventService
            +index(eventId)
            +generate(eventId)
            +generateAll(eventId)
            +download(id)
        }
    }

    namespace Application {
        class ClubService {
            -ClubRepositoryInterface clubRepository
            -ClubValidator clubValidator
            -ImageUploadService imageUploadService
            -AuditLogger auditLogger
            +create(data, files, userId)
            +update(id, data, files)
            +delete(id)
            +getClub(id)
            +getClubs(filters, page)
            +getStudentClubs(filters, page)
            +getMembers(clubId)
            +getLeadership(clubId)
            +getUpcomingEvents(clubId)
        }

        class MembershipService {
            -MembershipRepositoryInterface membershipRepository
            +join(clubId, userId)
            +leave(id)
            +approve(id)
            +reject(id)
            +updateRole(id, roleId)
            +getMyClubs(userId)
            +getClubMembers(clubId)
        }

        class EventService {
            -EventRepositoryInterface eventRepository
            -ImageUploadService imageUploadService
            -NotificationService notificationService
            -AuditLogger auditLogger
            +create(data, files)
            +update(id, data, files)
            +delete(id)
            +getEvent(id)
            +getEvents(filters, page)
            +register(eventId, userId)
            +cancelRegistration(eventId, userId)
            +approveRegistration(id)
            +rejectRegistration(id)
        }

        class EventAttendanceService {
            -EventAttendanceRepositoryInterface attendanceRepository
            -EventService eventService
            +getEventAttendance(eventId)
            +store(eventId, data)
            +update(eventId, data)
            +history(userId)
        }

        class EventFeedbackService {
            -EventFeedbackRepositoryInterface feedbackRepository
            -EventRepositoryInterface eventRepository
            +create(eventId, userId, data)
            +getByEvent(eventId)
            +getAll()
            +delete(id)
        }

        class EventCertificateService {
            -EventCertificateRepositoryInterface certificateRepository
            -EventService eventService
            -EventAttendanceService attendanceService
            -UserService userService
            +getCertificates(userId)
            +generate(eventId, userId)
            +generateAll(eventId)
            +download(id)
        }

        class ClubValidator {
            +validateCreate(data)
            +validateUpdate(data)
        }

        class EventValidator {
            +validateCreate(data)
            +validateUpdate(data)
        }

        class CertificatePdfService {
            +generate(certificateData)
        }

        class CertificateGenerator {
            +generateCertificateNumber()
        }
    }

    namespace Domain {
        class Club {
            -id int
            -categoryId int
            -name string
            -shortName string
            -description string
            -memberLimit int
            -membershipFee float
            -memberCount int
            -status string
            +getId()
            +getName()
            +getMembershipFee()
            +isActive()
        }

        class Membership {
            -id int
            -clubId int
            -userId int
            -roleId int
            -status string
            -joinedAt string
            +getId()
            +getClubId()
            +getUserId()
            +getStatus()
        }

        class Event {
            -id int
            -clubId int
            -title string
            -description string
            -eventDate string
            -location string
            -capacity int
            -status string
            +getId()
            +getClubId()
            +getTitle()
            +getStatus()
        }

        class EventAttendance {
            -id int
            -eventId int
            -userId int
            -status string
            -checkedInAt string
            +getId()
            +getEventId()
            +getUserId()
            +getStatus()
        }

        class EventFeedback {
            -id int
            -eventId int
            -userId int
            -rating int
            -comment string
            +getId()
            +getEventId()
            +getUserId()
            +getRating()
        }

        class EventCertificate {
            -id int
            -eventId int
            -userId int
            -certificateNumber string
            -filePath string
            -issuedAt string
            +getId()
            +getEventId()
            +getUserId()
            +getCertificateNumber()
        }

        class ClubRepositoryInterface {
            <<interface>>
            +create(Club)
            +update(Club)
            +delete(id)
            +findById(id)
            +findAll(filters, limit, offset)
            +findMembers(clubId)
            +findUpcomingEvents(clubId)
        }

        class MembershipRepositoryInterface {
            <<interface>>
            +create(Membership)
            +delete(id)
            +findById(id)
            +findByUser(userId)
            +findByClub(clubId)
            +approve(id)
            +reject(id)
            +updateRole(id, roleId)
        }

        class EventRepositoryInterface {
            <<interface>>
            +create(Event)
            +update(Event)
            +delete(id)
            +findById(id)
            +findAll(filters, limit, offset)
            +register(eventId, userId)
            +cancelRegistration(eventId, userId)
        }

        class EventAttendanceRepositoryInterface {
            <<interface>>
            +findByEvent(eventId)
            +store(eventId, data)
            +update(eventId, data)
            +history(userId)
        }

        class EventFeedbackRepositoryInterface {
            <<interface>>
            +create(EventFeedback)
            +findByEvent(eventId)
            +findAll()
            +delete(id)
        }

        class EventCertificateRepositoryInterface {
            <<interface>>
            +create(EventCertificate)
            +findById(id)
            +findByUser(userId)
            +findByEvent(eventId)
            +exists(eventId, userId)
        }
    }

    namespace Infrastructure {
        class ClubRepository {
            -db PDO
            +create(Club)
            +update(Club)
            +delete(id)
            +findById(id)
            +findAll(filters, limit, offset)
            -mapToClub(row)
        }

        class MembershipRepository {
            -db PDO
            +create(Membership)
            +delete(id)
            +findByUser(userId)
            +findByClub(clubId)
            +approve(id)
            +reject(id)
        }

        class EventRepository {
            -db PDO
            +create(Event)
            +update(Event)
            +delete(id)
            +findById(id)
            +findAll(filters, limit, offset)
            -mapToEvent(row)
        }

        class EventAttendanceRepository {
            -db PDO
            +findByEvent(eventId)
            +store(eventId, data)
            +update(eventId, data)
            +history(userId)
        }

        class EventFeedbackRepository {
            -db PDO
            +create(EventFeedback)
            +findByEvent(eventId)
            +findAll()
            +delete(id)
            -mapToFeedback(row)
        }

        class EventCertificateRepository {
            -db PDO
            +create(EventCertificate)
            +findById(id)
            +findByUser(userId)
            +findByEvent(eventId)
            -mapToCertificate(row)
        }

        class Database {
            +getConnection()
        }

        class ImageUploadService {
            +upload(file, folder)
        }

        class NotificationService {
            +create(userId, data)
            +latest(userId)
        }

        class AuditLogger {
            +log(action, userId, entityType, entityId, data)
        }
    }

    AdminClubController --> ClubService
    UserClubController --> ClubService
    UserClubController --> MembershipService
    MembershipController --> MembershipService
    AdminMembershipController --> MembershipService
    EventController --> EventService
    EventController --> ClubService
    EventController --> EventAttendanceService
    EventController --> EventCertificateService
    AdminEventController --> EventService
    AdminEventController --> ClubService
    AdminEventController --> EventAttendanceService
    EventAttendanceController --> EventAttendanceService
    AdminEventAttendanceController --> EventAttendanceService
    AdminEventAttendanceController --> EventService
    EventFeedbackController --> EventFeedbackService
    AdminEventFeedbackController --> EventFeedbackService
    AdminEventFeedbackController --> EventService
    EventCertificateController --> EventCertificateService
    AdminEventCertificateController --> EventCertificateService
    AdminEventCertificateController --> EventService

    ClubService --> ClubValidator
    ClubService --> ClubRepositoryInterface
    ClubService --> Club
    MembershipService --> MembershipRepositoryInterface
    MembershipService --> Membership
    EventService --> EventValidator
    EventService --> EventRepositoryInterface
    EventService --> Event
    EventAttendanceService --> EventAttendanceRepositoryInterface
    EventAttendanceService --> EventService
    EventAttendanceService --> EventAttendance
    EventFeedbackService --> EventFeedbackRepositoryInterface
    EventFeedbackService --> EventRepositoryInterface
    EventFeedbackService --> EventFeedback
    EventCertificateService --> EventCertificateRepositoryInterface
    EventCertificateService --> EventService
    EventCertificateService --> EventAttendanceService
    EventCertificateService --> CertificatePdfService
    EventCertificateService --> CertificateGenerator
    EventCertificateService --> EventCertificate

    Club "1" --> "*" Membership : has members
    Club "1" --> "*" Event : hosts
    Event "1" --> "*" EventAttendance : records
    Event "1" --> "*" EventFeedback : receives
    Event "1" --> "*" EventCertificate : issues
    Membership "*" --> "1" Club : belongs to
    EventAttendance "*" --> "1" Event : belongs to
    EventFeedback "*" --> "1" Event : belongs to
    EventCertificate "*" --> "1" Event : belongs to

    ClubRepositoryInterface <|.. ClubRepository
    MembershipRepositoryInterface <|.. MembershipRepository
    EventRepositoryInterface <|.. EventRepository
    EventAttendanceRepositoryInterface <|.. EventAttendanceRepository
    EventFeedbackRepositoryInterface <|.. EventFeedbackRepository
    EventCertificateRepositoryInterface <|.. EventCertificateRepository

    ClubRepository --> Database
    MembershipRepository --> Database
    EventRepository --> Database
    EventAttendanceRepository --> Database
    EventFeedbackRepository --> Database
    EventCertificateRepository --> Database
    ClubRepository --> Club
    MembershipRepository --> Membership
    EventRepository --> Event
    EventAttendanceRepository --> EventAttendance
    EventFeedbackRepository --> EventFeedback
    EventCertificateRepository --> EventCertificate
    ClubService --> ImageUploadService
    EventService --> ImageUploadService
    EventService --> NotificationService
    ClubService --> AuditLogger
    EventService --> AuditLogger
```

## Overall Request Flow

```mermaid
classDiagram
    direction LR

    class PublicIndex {
        <<entrypoint>>
        +boot application
    }

    class Bootstrap {
        +create() Container
    }

    class Container {
        -bindings array
        +bind(abstract, concrete)
        +resolve(abstract)
    }

    class Router {
        -routes array
        -container Container
        +get(uri, action, middlewares)
        +post(uri, action, middlewares)
        +dispatch(uri, method)
        -execute(route, params)
    }

    class Route {
        -method string
        -uri string
        -action array
        -middlewares array
        +getMethod()
        +getUri()
        +getAction()
        +getMiddlewares()
    }

    class Middleware {
        <<abstract role>>
        +handle()
    }

    class BaseController {
        +view(path, data, layout)
    }

    class PresentationController {
        <<presentation>>
        +index()
        +show(id)
        +store()
        +update(id)
        +delete(id)
    }

    class ApplicationService {
        <<application>>
        +create(data)
        +update(id, data)
        +delete(id)
        +get(id)
        +getAll(filters)
    }

    class Validator {
        <<application>>
        +validate(data)
    }

    class DTO {
        <<application>>
    }

    class DomainEntity {
        <<domain>>
        -id
        -domainFields
        +getId()
    }

    class RepositoryInterface {
        <<domain interface>>
        +create(entity)
        +update(entity)
        +delete(id)
        +findById(id)
        +findAll(filters)
    }

    class InfrastructureRepository {
        <<infrastructure>>
        -db PDO
        +create(entity)
        +update(entity)
        +delete(id)
        +findById(id)
        -mapToEntity(row)
    }

    class Database {
        <<infrastructure>>
        +getConnection()
    }

    class View {
        <<presentation>>
    }

    PublicIndex --> Bootstrap
    Bootstrap --> Container
    PublicIndex --> Router
    Router --> Route
    Router --> Container : resolves
    Router --> Middleware : runs before action
    Router --> PresentationController : dispatches action
    PresentationController --|> BaseController
    PresentationController --> ApplicationService
    PresentationController --> View
    ApplicationService --> Validator
    ApplicationService --> DTO
    ApplicationService --> RepositoryInterface
    ApplicationService --> DomainEntity
    RepositoryInterface <|.. InfrastructureRepository
    InfrastructureRepository --> Database
    InfrastructureRepository --> DomainEntity : maps rows
```

## Main DDD Pattern Per Module

```mermaid
classDiagram
    direction TB

    class ControllerLayer {
        <<Presentation>>
        Controllers
        Views
    }

    class ApplicationLayer {
        <<Application>>
        Services
        Validators
        DTOs
    }

    class DomainLayer {
        <<Domain>>
        Entities
        ValueObjects
        RepositoryInterfaces
        DomainExceptions
    }

    class InfrastructureLayer {
        <<Infrastructure>>
        PersistenceRepositories
        Database
        ExternalServices
    }

    ControllerLayer --> ApplicationLayer : calls use cases
    ApplicationLayer --> DomainLayer : uses entities/contracts
    InfrastructureLayer ..|> DomainLayer : implements repository contracts
    ApplicationLayer --> InfrastructureLayer : through interfaces bound in Container
```

## Club Module

```mermaid
classDiagram
    direction LR

    class AdminClubController {
        -ClubService clubService
        -MasterService masterService
        +index()
        +show(id)
        +create()
        +store()
        +edit(id)
        +update(id)
        +delete(id)
    }

    class UserClubController {
        -ClubService clubService
        -MasterService masterService
        -MembershipService membershipService
        +index()
        +show(id)
        +join(id)
    }

    class ClubService {
        -ClubRepositoryInterface repository
        -ClubValidator validator
        -ImageUploadService imageUploadService
        -AuditLogger auditLogger
        +create(data, files, userId) int
        +update(id, data, files) bool
        +delete(id) bool
        +getClub(id) Club
        +getClubs(filters, page) array
        +getStudentClubs(filters, page) array
        +getFeaturedClub() Club
        +getStatistics() array
        +getLeadership(clubId) array
        +getMembers(clubId) array
        +getUpcomingEvents(clubId) array
    }

    class ClubValidator {
        +validateCreate(data) array
        +validateUpdate(data) array
    }

    class ClubRepositoryInterface {
        <<interface>>
        +create(Club) int
        +update(Club) bool
        +delete(id) bool
        +findById(id) Club
        +findAll(filters, limit, offset) array
        +count(filters) int
        +existsByName(name) bool
        +existsByNameExcept(name, id) bool
    }

    class ClubRepository {
        -db PDO
        +create(Club) int
        +update(Club) bool
        +delete(id) bool
        +findById(id) Club
        +findAll(filters, limit, offset) array
        +findStudentClubs(filters, limit, offset) array
        +getStatistics() array
        -mapToClub(row) Club
    }

    class Club {
        -id int
        -categoryId int
        -categoryName string
        -name string
        -shortName string
        -description string
        -mission string
        -vision string
        -logo string
        -banner string
        -email string
        -phone string
        -establishedDate string
        -memberLimit int
        -membershipFee float
        -memberCount int
        -status string
        -createdBy int
        +getId()
        +getCategoryId()
        +getName()
        +getStatus()
        +isActive()
    }

    AdminClubController --> ClubService
    UserClubController --> ClubService
    ClubService --> ClubValidator
    ClubService --> ClubRepositoryInterface
    ClubService --> Club
    ClubService --> ImageUploadService
    ClubService --> AuditLogger
    ClubRepositoryInterface <|.. ClubRepository
    ClubRepository --> Club
```

## Auth Module

```mermaid
classDiagram
    direction LR

    class AuthController {
        -AuthService authService
        -MasterService masterService
        -RateLimitMiddleware rateLimitMiddleware
        -SecuritySettingHelper securitySettingHelper
        -RegisterValidator registerValidator
        +showLogin()
        +login()
        +showRegister()
        +register()
        +logout()
    }

    class PasswordResetController {
        -PasswordResetService passwordResetService
        -SecuritySettingHelper securitySettingHelper
        -ForgotPasswordValidator forgotPasswordValidator
        -VerifyOtpValidator verifyOtpValidator
        -ResetPasswordValidator resetPasswordValidator
        +showForgotPassword()
        +forgotPassword()
        +showVerifyOtp()
        +verifyOtp()
        +showResetPassword()
        +resetPassword()
    }

    class AuthService {
        -UserRepositoryInterface userRepository
        -AuditLogger auditLogger
        -MasterService masterService
        -LoginProtectionService loginProtectionService
        +register(RegisterDTO)
        +login(LoginDTO)
        +logout()
    }

    class PasswordResetService {
        -UserRepositoryInterface userRepository
        -PasswordResetRepositoryInterface passwordResetRepository
        -EmailService emailService
        -AuditLogger auditLogger
        +sendOtp(email)
        +verifyOtp(email, otp)
        +resetPassword(data)
    }

    class LoginProtectionService {
        -LoginAttemptRepositoryInterface repository
        -SecuritySettingHelper securitySettingHelper
        +recordFailedAttempt()
        +clearAttempts()
        +isLocked()
    }

    class UserRepositoryInterface {
        <<interface>>
    }

    class PasswordResetRepositoryInterface {
        <<interface>>
    }

    class LoginAttemptRepositoryInterface {
        <<interface>>
    }

    class UserRepository {
        <<infrastructure>>
    }

    class PasswordResetRepository {
        <<infrastructure>>
    }

    class LoginAttemptRepository {
        <<infrastructure>>
    }

    class User {
        <<domain entity>>
    }

    class PasswordResetOtp {
        <<domain entity>>
    }

    class Email {
        <<value object>>
    }

    class Password {
        <<value object>>
    }

    class StudentId {
        <<value object>>
    }

    class PhoneNumber {
        <<value object>>
    }

    AuthController --> AuthService
    PasswordResetController --> PasswordResetService
    AuthService --> UserRepositoryInterface
    AuthService --> LoginProtectionService
    PasswordResetService --> UserRepositoryInterface
    PasswordResetService --> PasswordResetRepositoryInterface
    LoginProtectionService --> LoginAttemptRepositoryInterface
    UserRepositoryInterface <|.. UserRepository
    PasswordResetRepositoryInterface <|.. PasswordResetRepository
    LoginAttemptRepositoryInterface <|.. LoginAttemptRepository
    AuthService --> User
    PasswordResetService --> PasswordResetOtp
    AuthService --> Email
    AuthService --> Password
    AuthService --> StudentId
    AuthService --> PhoneNumber
```

## Event, Attendance, Feedback, And Certificate Flow

```mermaid
classDiagram
    direction LR

    class EventController {
        -EventService eventService
        -ClubService clubService
        -MasterService masterService
        -UserService userService
        -EventAttendanceService eventAttendanceService
        -EventCertificateService eventCertificateService
        +index()
        +show(id)
        +register(id)
        +cancelRegistration(id)
    }

    class AdminEventController {
        -EventService eventService
        -ClubService clubService
        -MasterService masterService
        -EventAttendanceService eventAttendanceService
        +index()
        +create()
        +store()
        +edit(id)
        +update(id)
        +delete(id)
        +registrations(id)
    }

    class EventService {
        -EventRepositoryInterface repository
        -ImageUploadService imageUploadService
        -NotificationService notificationService
        -AuditLogger auditLogger
        +create(data, files)
        +update(id, data, files)
        +delete(id)
        +getEvent(id)
        +getEvents(filters, page)
        +register(eventId, userId)
        +cancelRegistration(eventId, userId)
    }

    class EventAttendanceService {
        -EventAttendanceRepositoryInterface repository
        -EventService eventService
        +getEventAttendance(eventId)
        +store(eventId, data)
        +update(eventId, data)
        +history(userId)
    }

    class EventFeedbackService {
        -EventFeedbackRepositoryInterface repository
        -EventRepositoryInterface eventRepository
        +create(eventId, userId, data)
        +getByEvent(eventId)
        +delete(id)
    }

    class EventCertificateService {
        -EventCertificateRepositoryInterface repository
        -EventService eventService
        -EventAttendanceService attendanceService
        -UserService userService
        +generate(eventId, userId)
        +generateAll(eventId)
        +download(id)
    }

    class EventRepositoryInterface {
        <<interface>>
    }

    class EventAttendanceRepositoryInterface {
        <<interface>>
    }

    class EventFeedbackRepositoryInterface {
        <<interface>>
    }

    class EventCertificateRepositoryInterface {
        <<interface>>
    }

    class EventRepository {
        <<infrastructure>>
    }

    class EventAttendanceRepository {
        <<infrastructure>>
    }

    class EventFeedbackRepository {
        <<infrastructure>>
    }

    class EventCertificateRepository {
        <<infrastructure>>
    }

    class Event {
        <<domain entity>>
    }

    class EventAttendance {
        <<domain entity>>
    }

    class EventFeedback {
        <<domain entity>>
    }

    class EventCertificate {
        <<domain entity>>
    }

    EventController --> EventService
    EventController --> EventAttendanceService
    EventController --> EventCertificateService
    AdminEventController --> EventService
    AdminEventController --> EventAttendanceService
    EventService --> EventRepositoryInterface
    EventAttendanceService --> EventAttendanceRepositoryInterface
    EventAttendanceService --> EventService
    EventFeedbackService --> EventFeedbackRepositoryInterface
    EventFeedbackService --> EventRepositoryInterface
    EventCertificateService --> EventCertificateRepositoryInterface
    EventCertificateService --> EventService
    EventCertificateService --> EventAttendanceService
    EventRepositoryInterface <|.. EventRepository
    EventAttendanceRepositoryInterface <|.. EventAttendanceRepository
    EventFeedbackRepositoryInterface <|.. EventFeedbackRepository
    EventCertificateRepositoryInterface <|.. EventCertificateRepository
    EventService --> Event
    EventAttendanceService --> EventAttendance
    EventFeedbackService --> EventFeedback
    EventCertificateService --> EventCertificate
```

## Membership And Payment Flow

```mermaid
classDiagram
    direction LR

    class MembershipController {
        -MembershipService membershipService
        +join(id)
        +myClubs()
        +leave(id)
    }

    class AdminMembershipController {
        -MembershipService membershipService
        +index()
        +members(id)
        +editRole(id)
        +updateRole()
        +approve(id)
        +reject(id)
        +remove(id)
    }

    class MembershipService {
        -MembershipRepositoryInterface repository
        -ClubRepositoryInterface clubRepository
        -AuditLogger auditLogger
        +join(clubId, userId)
        +leave(membershipId)
        +approve(id)
        +reject(id)
        +updateRole(id, role)
    }

    class StudentPaymentController {
        -PaymentService paymentService
        +create(clubId)
        +store()
        +history()
        +show(id)
    }

    class AdminPaymentController {
        -PaymentService paymentService
        +index()
        +show(id)
        +verify(id)
        +reject(id)
    }

    class PaymentService {
        -PaymentRepositoryInterface repository
        -PaymentValidator validator
        -ImageUploadService imageUploadService
        +create(data, files)
        +getPayment(id)
        +getHistory(userId)
        +verify(id)
        +reject(id)
    }

    class MembershipRepositoryInterface {
        <<interface>>
    }

    class PaymentRepositoryInterface {
        <<interface>>
    }

    class MembershipRepository {
        <<infrastructure>>
    }

    class PaymentRepository {
        <<infrastructure>>
    }

    class Membership {
        <<domain entity>>
    }

    class Payment {
        <<domain entity>>
    }

    MembershipController --> MembershipService
    AdminMembershipController --> MembershipService
    MembershipService --> MembershipRepositoryInterface
    MembershipService --> ClubRepositoryInterface
    MembershipRepositoryInterface <|.. MembershipRepository
    MembershipService --> Membership
    StudentPaymentController --> PaymentService
    AdminPaymentController --> PaymentService
    PaymentService --> PaymentRepositoryInterface
    PaymentService --> PaymentValidator
    PaymentService --> Payment
    PaymentRepositoryInterface <|.. PaymentRepository
```

## Admin And Settings Flow

```mermaid
classDiagram
    direction LR

    class DashboardController {
        -DashboardService dashboardService
        +index()
    }

    class DashboardService {
        -DashboardRepositoryInterface repository
        +getDashboardData()
    }

    class UserManagementController {
        -UserManagementService userManagementService
        -MasterService masterService
        +index()
        +show(id)
        +edit(id)
        +update(id)
        +delete(id)
    }

    class UserManagementService {
        -UserManagementRepositoryInterface repository
        +getUsers(filters)
        +getUser(id)
        +update(id, data)
        +delete(id)
    }

    class RolePermissionController {
        -RolePermissionService rolePermissionService
        -RoleRepositoryInterface roleRepository
        -PermissionRepositoryInterface permissionRepository
        +index()
        +permissions(id)
        +update(id)
    }

    class RolePermissionService {
        -RolePermissionRepositoryInterface repository
        +getPermissions(roleId)
        +updatePermissions(roleId, permissions)
    }

    class PermissionService {
        -PermissionRepositoryInterface repository
        +getAll()
        +userHasPermission(userId, permission)
    }

    class GeneralSettingController {
        -GeneralSettingService generalSettingService
        +index()
        +update()
    }

    class SecuritySettingController {
        -SecuritySettingService securitySettingService
        +index()
        +update()
    }

    class DashboardRepositoryInterface {
        <<interface>>
    }

    class UserManagementRepositoryInterface {
        <<interface>>
    }

    class RoleRepositoryInterface {
        <<interface>>
    }

    class PermissionRepositoryInterface {
        <<interface>>
    }

    class RolePermissionRepositoryInterface {
        <<interface>>
    }

    class GeneralSettingRepositoryInterface {
        <<interface>>
    }

    class SecuritySettingRepositoryInterface {
        <<interface>>
    }

    DashboardController --> DashboardService
    DashboardService --> DashboardRepositoryInterface
    UserManagementController --> UserManagementService
    UserManagementService --> UserManagementRepositoryInterface
    RolePermissionController --> RolePermissionService
    RolePermissionController --> RoleRepositoryInterface
    RolePermissionController --> PermissionRepositoryInterface
    RolePermissionService --> RolePermissionRepositoryInterface
    PermissionService --> PermissionRepositoryInterface
    GeneralSettingController --> GeneralSettingService
    SecuritySettingController --> SecuritySettingService
    GeneralSettingService --> GeneralSettingRepositoryInterface
    SecuritySettingService --> SecuritySettingRepositoryInterface
```

## Other Feature Modules

```mermaid
classDiagram
    direction LR

    class AnnouncementController {
        -AnnouncementService announcementService
        +index()
        +show(id)
    }

    class AdminAnnouncementController {
        -AnnouncementService announcementService
        -ClubService clubService
        +index()
        +create()
        +store()
        +show(id)
        +edit(id)
        +update(id)
        +delete(id)
    }

    class AnnouncementService {
        -AnnouncementRepositoryInterface repository
        -NotificationService notificationService
        -UserService userService
        -AuditLogger auditLogger
    }

    class ContactController {
        -ContactService contactService
        -GeneralSettingService generalSettingService
        +index()
        +send()
    }

    class AdminContactController {
        -ContactService contactService
        +index()
        +show(id)
        +updateStatus(id)
        +delete(id)
    }

    class ContactService {
        -ContactRepositoryInterface repository
    }

    class NotificationController {
        -NotificationService notificationService
        +index()
        +read(id)
        +readAll()
        +unreadCount()
        +latest()
    }

    class NotificationService {
        -NotificationRepositoryInterface repository
    }

    class MasterService {
        -MasterRepositoryInterface repository
        +getClubCategories()
    }

    AnnouncementController --> AnnouncementService
    AdminAnnouncementController --> AnnouncementService
    AnnouncementService --> AnnouncementRepositoryInterface
    AnnouncementService --> NotificationService
    ContactController --> ContactService
    AdminContactController --> ContactService
    ContactService --> ContactRepositoryInterface
    NotificationController --> NotificationService
    NotificationService --> NotificationRepositoryInterface
    MasterService --> MasterRepositoryInterface
```

## Simplified Class Diagram For Report

Use this smaller version if your report needs one clean page.

```mermaid
classDiagram
    direction TB

    class Router
    class Middleware
    class Controller
    class Service
    class Validator
    class RepositoryInterface {
        <<interface>>
    }
    class Entity
    class Repository
    class Database
    class View

    Router --> Middleware
    Router --> Controller
    Controller --> Service
    Controller --> View
    Service --> Validator
    Service --> Entity
    Service --> RepositoryInterface
    RepositoryInterface <|.. Repository
    Repository --> Database
    Repository --> Entity
```
