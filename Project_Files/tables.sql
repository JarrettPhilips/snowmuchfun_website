# NAME:
#   tables.sql
#
# PURPOSE:
#   Define bother user and location tables 
#
# MODIFICATION HISTORY:
#   2018/03/12: Robert Sewell

#Table for user loging
CREATE TABLE if not exists users (
   UserName       varchar(40)    unique   NOT NULL,
   Password       varchar(40)    NOT NULL,
   Submissions    INT            NULL,
   Logins         INT            NULL,
   PRIMARY KEY  (UserName)
   ) 
   CHARACTER SET utf8 COLLATE utf8_general_ci;

INSERT INTO users Values ('TestUser','TestUsersPassword!');


#Table for map locations
CREATE TABLE if not exists locations (
   LocationName   varchar(40)    unique NOT NULL,
   Latitude       FLOAT(3,2)     NOT NULL,
   Longitude      FLOAT(3,2)     NOT NULL,
   Temperature    FLOAT(3,2)     NULL,
   Conditions     varchar(1000)  NULL,   
   AreaType       varchar(40)    NULL,
   PRIMARY KEY  (LocationName)
   ) 
   CHARACTER SET utf8 COLLATE utf8_general_ci;

INSERT INTO locations Values ('Rocky Mountain National Park', 40.34, 105.68, 20, 
                              'Snowing', 'National Park');


#Table for user submission information
CREATE TABLE if not exists reports (
   SubmissionID         INT            NOT NULL auto_increment,
   User                 varchar(40)    NOT NULL,
   LocationName         varchar(40)    NOT NULL,
   Activity             varchar(40)    NOT NULL,
   Conditions           varchar(100)   NULL,
   RoadConditions       varchar(100)   NULL,
   LocationDescription  varchar(1000)  NULL,
   ActivityDescription  varchar(1000)  NOT NULL  
   PRIMARY KEY    (SubmissionID)
   )
   CHARACTER SET utf8 COLLATE utf8_general_ci;

INSERT INTO locations Values (1, 'TestUser', 'Rocky Mountain National Park', 
                              'Hiking', 'Snow packed trail', 'Icy and snow packed road',
                              'Take Bear Lake road to Bear Lake', 
                              'Follow the trail to Emerald Lake from the Bear Lake trailhead.');