DELIMITER $$

/*
|--------------------------------------------------------------------------
| Check duplicate club name
|--------------------------------------------------------------------------
*/

DROP PROCEDURE IF EXISTS sp_club_exists_by_name $$

CREATE PROCEDURE sp_club_exists_by_name(
    IN p_name VARCHAR(150)
)
BEGIN

    SELECT COUNT(*) AS total

    FROM clubs

    WHERE name = p_name

    AND deleted_at IS NULL;

END $$

/*
|--------------------------------------------------------------------------
| Check duplicate name except current ID
|--------------------------------------------------------------------------
*/

DROP PROCEDURE IF EXISTS sp_club_exists_by_name_except $$

CREATE PROCEDURE sp_club_exists_by_name_except(

    IN p_id BIGINT,

    IN p_name VARCHAR(150)

)
BEGIN

    SELECT COUNT(*) AS total

    FROM clubs

    WHERE name = p_name

    AND id <> p_id

    AND deleted_at IS NULL;

END $$

/*
|--------------------------------------------------------------------------
| Create Club
|--------------------------------------------------------------------------
*/

DROP PROCEDURE IF EXISTS sp_club_create $$

CREATE PROCEDURE sp_club_create(

    IN p_category_id BIGINT,

    IN p_name VARCHAR(150),

    IN p_short_name VARCHAR(50),

    IN p_description TEXT,

    IN p_mission TEXT,

    IN p_vision TEXT,

    IN p_logo VARCHAR(255),

    IN p_banner VARCHAR(255),

    IN p_email VARCHAR(150),

    IN p_phone VARCHAR(20),

    IN p_established_date DATE,

    IN p_member_limit INT,

    IN p_created_by BIGINT

)

BEGIN

INSERT INTO clubs
(
    category_id,
    name,
    short_name,
    description,
    mission,
    vision,
    logo,
    banner,
    email,
    phone,
    established_date,
    member_limit,
    created_by
)

VALUES
(
    p_category_id,
    p_name,
    p_short_name,
    p_description,
    p_mission,
    p_vision,
    p_logo,
    p_banner,
    p_email,
    p_phone,
    p_established_date,
    p_member_limit,
    p_created_by
);

SELECT LAST_INSERT_ID() AS id;

END $$

/*
|--------------------------------------------------------------------------
| Find Club By ID
|--------------------------------------------------------------------------
*/

DROP PROCEDURE IF EXISTS sp_club_find_by_id $$

CREATE PROCEDURE sp_club_find_by_id(

    IN p_id BIGINT

)

BEGIN

SELECT *

FROM clubs

WHERE id = p_id

AND deleted_at IS NULL

LIMIT 1;

END $$

/*
|--------------------------------------------------------------------------
| Get All Clubs
|--------------------------------------------------------------------------
*/

DROP PROCEDURE IF EXISTS sp_club_find_all $$

CREATE PROCEDURE sp_club_find_all()

BEGIN

SELECT *

FROM clubs

WHERE deleted_at IS NULL

ORDER BY created_at DESC;

END $$


/*
|--------------------------------------------------------------------------
| Get All Clubs With Details
|--------------------------------------------------------------------------
*/

DROP PROCEDURE IF EXISTS sp_club_find_all_with_details $$

CREATE PROCEDURE sp_club_find_all_with_details()

BEGIN

SELECT

    c.id,

    c.name,

    c.short_name,

    c.logo,

    c.banner,

    c.status,

    c.created_at,

    cc.id AS category_id,

    cc.name AS category_name,


    COUNT(cm.id) AS member_count

FROM clubs c

INNER JOIN club_categories cc

ON cc.id = c.category_id

LEFT JOIN club_memberships cm

ON cm.club_id = c.id

AND cm.membership_status = 'approved'

WHERE c.deleted_at IS NULL

GROUP BY

    c.id,

    c.name,

    c.short_name,

    c.logo,

    c.banner,

    c.status,

    c.created_at,

    cc.id,

    cc.name

ORDER BY c.created_at DESC;

END $$

/*
|--------------------------------------------------------------------------
| Update Club
|--------------------------------------------------------------------------
*/

DROP PROCEDURE IF EXISTS sp_club_update $$


CREATE PROCEDURE sp_club_update(

    IN p_id BIGINT,

    IN p_category_id BIGINT,

    IN p_name VARCHAR(150),

    IN p_short_name VARCHAR(50),

    IN p_description TEXT,

    IN p_mission TEXT,

    IN p_vision TEXT,

    IN p_logo VARCHAR(255),

    IN p_banner VARCHAR(255),

    IN p_email VARCHAR(150),

    IN p_phone VARCHAR(20),

    IN p_established_date DATE,

    IN p_member_limit INT,

    IN p_status VARCHAR(20)

)

BEGIN

UPDATE clubs

SET

category_id = p_category_id,

name = p_name,

short_name = p_short_name,

description = p_description,

mission = p_mission,

vision = p_vision,

logo = p_logo,

banner = p_banner,

email = p_email,

phone = p_phone,

established_date = p_established_date,

member_limit = p_member_limit,

status = p_status

WHERE id = p_id;

SELECT ROW_COUNT() AS affected;

END $$


/*
|--------------------------------------------------------------------------
| Soft Delete Club
|--------------------------------------------------------------------------
*/

DROP PROCEDURE IF EXISTS sp_club_delete $$


CREATE PROCEDURE sp_club_delete(

    IN p_id BIGINT

)

BEGIN

UPDATE clubs

SET deleted_at = CURRENT_TIMESTAMP

WHERE id = p_id;

SELECT ROW_COUNT() AS affected;

END $$

/*
|--------------------------------------------------------------------------
| Dashboard Statistics
|--------------------------------------------------------------------------
*/

DROP PROCEDURE IF EXISTS sp_club_statistics $$

CREATE PROCEDURE sp_club_statistics()

BEGIN

SELECT

(
    SELECT COUNT(*)
    FROM clubs
    WHERE deleted_at IS NULL
)
AS total_clubs,

(
    SELECT COUNT(*)
    FROM clubs
    WHERE status='active'
    AND deleted_at IS NULL
)
AS active_clubs,

(
    SELECT COUNT(*)
    FROM club_categories
)
AS categories,

(
    SELECT COUNT(*)
    FROM club_memberships
    WHERE membership_status='approved'
)
AS total_members;

END $$

DELIMITER ;