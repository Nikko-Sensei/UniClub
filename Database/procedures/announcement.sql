DELIMITER $$

CREATE PROCEDURE sp_announcement_create
(
    IN p_club_id BIGINT,
    IN p_title VARCHAR(200),
    IN p_content TEXT,
    IN p_priority VARCHAR(20),
    IN p_image VARCHAR(255),
    IN p_status VARCHAR(20),
    IN p_created_by BIGINT
)

BEGIN

    INSERT INTO announcements
    (
        club_id,
        title,
        content,
        priority,
        image,
        status,
        created_by
    )

    VALUES
    (
        p_club_id,
        p_title,
        p_content,
        p_priority,
        p_image,
        p_status,
        p_created_by
    );


    SELECT LAST_INSERT_ID() AS id;

END$$

DELIMITER ;



DELIMITER $$

CREATE PROCEDURE sp_announcement_find_by_id
(
    IN p_id BIGINT
)

BEGIN

    SELECT *

    FROM announcements

    WHERE id = p_id

    AND deleted_at IS NULL

    LIMIT 1;

END$$

DELIMITER ;


DELIMITER $$

CREATE PROCEDURE sp_announcement_find_all()

BEGIN

    SELECT *

    FROM announcements

    WHERE deleted_at IS NULL

    ORDER BY created_at DESC;

END$$

DELIMITER ;


DELIMITER $$

CREATE PROCEDURE sp_announcement_find_by_club
(
    IN p_club_id BIGINT
)

BEGIN

    SELECT *

    FROM announcements

    WHERE club_id = p_club_id

    AND deleted_at IS NULL

    ORDER BY created_at DESC;

END$$

DELIMITER ;


DELIMITER $$

CREATE PROCEDURE sp_announcement_find_published()

BEGIN

    SELECT *

    FROM announcements

    WHERE status = 'published'

    AND deleted_at IS NULL

    ORDER BY published_at DESC;

END$$

DELIMITER ;


DELIMITER $$

CREATE PROCEDURE sp_announcement_update
(
    IN p_id BIGINT,
    IN p_title VARCHAR(200),
    IN p_content TEXT,
    IN p_priority VARCHAR(20),
    IN p_image VARCHAR(255),
    IN p_status VARCHAR(20)
)

BEGIN

    UPDATE announcements

    SET

        title = p_title,

        content = p_content,

        priority = p_priority,

        image = p_image,

        status = p_status,

        published_at =
        CASE
            WHEN p_status = 'published'
            THEN COALESCE(published_at, NOW())

            ELSE published_at

        END


    WHERE id = p_id;

END$$

DELIMITER ;


DELIMITER $$

CREATE PROCEDURE sp_announcement_delete
(
    IN p_id BIGINT
)

BEGIN

    UPDATE announcements

    SET deleted_at = NOW()

    WHERE id = p_id;

END$$

DELIMITER ;