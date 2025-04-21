-- Table for Attendance
CREATE TABLE tblattendance (
    Studebtname VARCHAR(255) NOT
    ID int(11) NOT NULL AUTO_INCREMENT,
    StudentID int(11) NOT NULL,
    ClassID int(11) NOT NULL,
    AttendanceStatus varchar(20) NOT NULL,
    AttendanceDate date NOT NULL,
    CreationDate timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (ID)
);



-- Table for Fees
CREATE TABLE tblfees (
    ID int(11) NOT NULL AUTO_INCREMENT,
    StudentID int(11) NOT NULL,
    ClassID int(11) NOT NULL,
    FeesAmount decimal(10,2) NOT NULL,
    PaymentStatus varchar(20) NOT NULL,
    PaymentDate date,
    CreationDate timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (ID)
);

-- Table for Results
CREATE TABLE tblresults (
    ID int(11) NOT NULL AUTO_INCREMENT,
    StudentID int(11) NOT NULL,
    ClassID int(11) NOT NULL,
    SubjectID int(11) NOT NULL,
    Marks int(11) NOT NULL,
    Term varchar(20) NOT NULL,
    CreationDate timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (ID)
); 