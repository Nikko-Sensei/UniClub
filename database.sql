CREATE TABLE roles
(
    id BIGINT AUTO_INCREMENT PRIMARY KEY,

    name VARCHAR(50) UNIQUE NOT NULL,

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ON UPDATE CURRENT_TIMESTAMP
);


INSERT INTO roles(name)
VALUES
('admin'),
('student'),
('club_manager');


CREATE TABLE departments
(
    id BIGINT AUTO_INCREMENT PRIMARY KEY,

    code VARCHAR(10) UNIQUE NOT NULL,

    name VARCHAR(100) UNIQUE NOT NULL,


    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ON UPDATE CURRENT_TIMESTAMP
);


CREATE TABLE academic_years
(
    id BIGINT AUTO_INCREMENT PRIMARY KEY,

    name VARCHAR(50) UNIQUE NOT NULL,


    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ON UPDATE CURRENT_TIMESTAMP
);


CREATE TABLE users
(
    id BIGINT AUTO_INCREMENT PRIMARY KEY,


    role_id BIGINT NOT NULL,


    student_id VARCHAR(30) UNIQUE,


    name VARCHAR(100) NOT NULL,


    email VARCHAR(150) UNIQUE NOT NULL,


    password VARCHAR(255) NOT NULL,


    phone VARCHAR(20),


    department_id BIGINT,

    academic_year_id BIGINT,


    profile_image VARCHAR(255),


    status ENUM(
        'active',
        'inactive',
        'suspended'
    )
    DEFAULT 'active',


    last_login_at DATETIME NULL,


    deleted_at TIMESTAMP NULL,


    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ON UPDATE CURRENT_TIMESTAMP,


    FOREIGN KEY(role_id)
    REFERENCES roles(id),


    FOREIGN KEY(department_id)
    REFERENCES departments(id)
    ON DELETE SET NULL,


    FOREIGN KEY(academic_year_id)
    REFERENCES academic_years(id)
    ON DELETE SET NULL
);


CREATE TABLE club_categories
(
    id BIGINT AUTO_INCREMENT PRIMARY KEY,

    name VARCHAR(100) UNIQUE NOT NULL,

    description TEXT,


    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ON UPDATE CURRENT_TIMESTAMP
);


CREATE TABLE clubs
(
    id BIGINT AUTO_INCREMENT PRIMARY KEY,


    category_id BIGINT NOT NULL,


    name VARCHAR(150) NOT NULL,


    short_name VARCHAR(50),


    description TEXT,


    mission TEXT,

    vision TEXT,


    logo VARCHAR(255),

    banner VARCHAR(255),


    email VARCHAR(150),

    phone VARCHAR(20),


    established_date DATE,


    member_limit INT,


    status ENUM(
        'active',
        'inactive'
    )
    DEFAULT 'active',


    created_by BIGINT,


    deleted_at TIMESTAMP NULL,


    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,


    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ON UPDATE CURRENT_TIMESTAMP,


    FOREIGN KEY(category_id)
    REFERENCES club_categories(id),


    FOREIGN KEY(created_by)
    REFERENCES users(id)
    ON DELETE SET NULL
);


CREATE TABLE club_roles
(
    id BIGINT AUTO_INCREMENT PRIMARY KEY,

    name VARCHAR(100) UNIQUE NOT NULL
);


INSERT INTO club_roles(name)
VALUES
('President'),
('Vice President'),
('Secretary'),
('Treasurer'),
('Member');


CREATE TABLE club_memberships
(
    id BIGINT AUTO_INCREMENT PRIMARY KEY,


    club_id BIGINT NOT NULL,

    user_id BIGINT NOT NULL,


    club_role_id BIGINT NOT NULL,


    membership_status ENUM(
        'pending',
        'approved',
        'rejected'
    )
    DEFAULT 'pending',


    joined_at DATE,


    approved_by BIGINT,


    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,


    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ON UPDATE CURRENT_TIMESTAMP,


    UNIQUE(club_id,user_id),


    FOREIGN KEY(club_id)
    REFERENCES clubs(id)
    ON DELETE CASCADE,


    FOREIGN KEY(user_id)
    REFERENCES users(id)
    ON DELETE CASCADE,


    FOREIGN KEY(club_role_id)
    REFERENCES club_roles(id),


    FOREIGN KEY(approved_by)
    REFERENCES users(id)
    ON DELETE SET NULL
);

CREATE TABLE events
(
    id BIGINT AUTO_INCREMENT PRIMARY KEY,


    club_id BIGINT NOT NULL,

    category_id BIGINT NOT NULL,


    title VARCHAR(200) NOT NULL,


    description TEXT,


    venue VARCHAR(200),


    event_date DATE,


    start_time TIME,

    end_time TIME,


    capacity INT,


    registration_deadline DATETIME,


    banner VARCHAR(255),


    certificate_enabled BOOLEAN DEFAULT FALSE,


    status ENUM(
        'draft',
        'published',
        'completed',
        'cancelled'
    )
    DEFAULT 'draft',


    created_by BIGINT,


    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,


    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ON UPDATE CURRENT_TIMESTAMP,


    FOREIGN KEY(club_id)
    REFERENCES clubs(id)
    ON DELETE CASCADE,


    FOREIGN KEY(category_id)
    REFERENCES event_categories(id)
);


CREATE TABLE event_categories
(
    id BIGINT AUTO_INCREMENT PRIMARY KEY,

    name VARCHAR(100) UNIQUE NOT NULL,

    description TEXT
);

CREATE TABLE event_registrations
(
    id BIGINT AUTO_INCREMENT PRIMARY KEY,


    event_id BIGINT NOT NULL,

    user_id BIGINT NOT NULL,


    status ENUM(
        'pending',
        'approved',
        'rejected',
        'cancelled'
    )
    DEFAULT 'pending',


    registered_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,


    UNIQUE(event_id,user_id),


    FOREIGN KEY(event_id)
    REFERENCES events(id)
    ON DELETE CASCADE,


    FOREIGN KEY(user_id)
    REFERENCES users(id)
    ON DELETE CASCADE
);


CREATE TABLE event_attendances
(
    id BIGINT AUTO_INCREMENT PRIMARY KEY,


    event_id BIGINT NOT NULL,

    user_id BIGINT NOT NULL,


    attendance_status ENUM(
        'present',
        'absent'
    )
    DEFAULT 'absent',


    checked_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,


    FOREIGN KEY(event_id)
    REFERENCES events(id)
    ON DELETE CASCADE,


    FOREIGN KEY(user_id)
    REFERENCES users(id)
    ON DELETE CASCADE
);


CREATE TABLE event_feedbacks
(
    id BIGINT AUTO_INCREMENT PRIMARY KEY,


    event_id BIGINT NOT NULL,

    user_id BIGINT NOT NULL,


    rating INT CHECK(rating BETWEEN 1 AND 5),


    comment TEXT,


    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,


    UNIQUE(event_id,user_id),


    FOREIGN KEY(event_id)
    REFERENCES events(id)
    ON DELETE CASCADE,


    FOREIGN KEY(user_id)
    REFERENCES users(id)
    ON DELETE CASCADE
);


CREATE TABLE certificates
(
    id BIGINT AUTO_INCREMENT PRIMARY KEY,


    event_id BIGINT NOT NULL,

    user_id BIGINT NOT NULL,


    certificate_number VARCHAR(100) UNIQUE,


    file_path VARCHAR(255),


    issued_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,


    FOREIGN KEY(event_id)
    REFERENCES events(id),


    FOREIGN KEY(user_id)
    REFERENCES users(id)
);


CREATE TABLE announcements
(
    id BIGINT AUTO_INCREMENT PRIMARY KEY,


    club_id BIGINT,


    title VARCHAR(200),


    content TEXT,


    priority ENUM(
        'low',
        'medium',
        'high'
    )
    DEFAULT 'medium',


    image VARCHAR(255),


    status ENUM(
        'draft',
        'published'
    )
    DEFAULT 'draft',


    created_by BIGINT,


    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,


    FOREIGN KEY(club_id)
    REFERENCES clubs(id)
    ON DELETE SET NULL
);

CREATE TABLE notifications
(
    id BIGINT AUTO_INCREMENT PRIMARY KEY,


    user_id BIGINT NOT NULL,


    title VARCHAR(200),

    message TEXT,


    is_read BOOLEAN DEFAULT FALSE,


    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,


    FOREIGN KEY(user_id)
    REFERENCES users(id)
    ON DELETE CASCADE
);


CREATE TABLE password_reset_tokens (

    id BIGINT AUTO_INCREMENT PRIMARY KEY,

    user_id BIGINT NOT NULL,

    otp_code CHAR(6) NOT NULL,

    expires_at TIMESTAMP NOT NULL,

    used_at TIMESTAMP NULL,

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (user_id)
        REFERENCES users(id)
        ON DELETE CASCADE,

    INDEX idx_otp (otp_code),
    INDEX idx_user (user_id)

);

CREATE TABLE audit_logs ( id BIGINT AUTO_INCREMENT PRIMARY KEY,
 user_id BIGINT, action VARCHAR(255), 
 entity VARCHAR(100), entity_id BIGINT, 
 created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, 
 FOREIGN KEY(user_id) REFERENCES users(id) ON DELETE SET NULL );

 CREATE TABLE permissions (
    id BIGINT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    slug VARCHAR(100) NOT NULL UNIQUE,
    description VARCHAR(255) NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE role_permissions (
    role_id BIGINT NOT NULL,
    permission_id BIGINT NOT NULL,

    PRIMARY KEY (role_id, permission_id),

    CONSTRAINT fk_role_permissions_role
        FOREIGN KEY (role_id)
        REFERENCES roles(id)
        ON DELETE CASCADE,

    CONSTRAINT fk_role_permissions_permission
        FOREIGN KEY (permission_id)
        REFERENCES permissions(id)
        ON DELETE CASCADE
);