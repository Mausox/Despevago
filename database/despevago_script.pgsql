/*---------- SCRIPT DESPEVAGO DATABASE ------------*/

DROP DATABASE if exists despevago;

CREATE DATABASE despevago;

/*-----------------CONNECT TO DATABASE ------------*/

\connect despevago;

/*------------------- SET TIMEZONE -------------------*/

set timezone to 'America/Santiago';

/* ------------------ DROP TABLES -----------------*/
DROP TABLE IF EXISTS seats CASCADE;
DROP TABLE IF EXISTS passengers CASCADE;
DROP TABLE IF EXISTS class_types CASCADE;
DROP TABLE IF EXISTS flights CASCADE;
DROP TABLE IF EXISTS airlines CASCADE;
DROP TABLE IF EXISTS airlines_contacts CASCADE;
DROP TABLE IF EXISTS airports CASCADE;
DROP TABLE IF EXISTS cars CASCADE;
DROP TABLE IF EXISTS car_options CASCADE;
DROP TABLE IF EXISTS companies CASCADE;
DROP TABLE IF EXISTS branch_offices CASCADE;
DROP TABLE IF EXISTS branch_offices_contacts CASCADE;
DROP TABLE IF EXISTS unavailable_cars CASCADE;
DROP TABLE IF EXISTS car_flight_packages CASCADE;
DROP TABLE IF EXISTS room_flight_packages CASCADE;
DROP TABLE IF EXISTS users CASCADE;
DROP TABLE IF EXISTS user_types CASCADE;
DROP TABLE IF EXISTS user_histories CASCADE;
DROP TABLE IF EXISTS payment_histories CASCADE;
DROP TABLE IF EXISTS payment_methods CASCADE;
DROP TABLE IF EXISTS reservations CASCADE;
DROP TABLE IF EXISTS cities CASCADE;
DROP TABLE IF EXISTS countries CASCADE;
DROP TABLE IF EXISTS transfers CASCADE;
DROP TABLE IF EXISTS transfer_cars CASCADE;
DROP TABLE IF EXISTS unavailable_rooms CASCADE;
DROP TABLE IF EXISTS rooms CASCADE;
DROP TABLE IF EXISTS room_options CASCADE;
DROP TABLE IF EXISTS hotels CASCADE;
DROP TABLE IF EXISTS hotel_contacts CASCADE;
DROP TABLE IF EXISTS activities CASCADE;
DROP TABLE IF EXISTS users_user_types CASCADE;
DROP TABLE IF EXISTS reservations_seats CASCADE;
DROP TABLE IF EXISTS reservations_transfers CASCADE;
DROP TABLE IF EXISTS airports_transfers CASCADE;
DROP TABLE IF EXISTS rooms_room_options CASCADE;
DROP TABLE IF EXISTS activity_reservations CASCADE;
DROP TABLE IF EXISTS cars_car_options CASCADE;
DROP TABLE IF EXISTS airline_contacts CASCADE;

/* ----------------------- TABLES ----------------------- */

/* SEATS TABLE */
CREATE TABLE seats
(
    id                          serial          PRIMARY KEY,
    number                      varchar(30)     NOT NULL,
    status                      integer         NOT NULL,
    price                       money           NOT NULL,
    passenger_id                integer         NOT NULL,
    class_type_id               integer         NOT NULL,
    flight_id                   integer         NOT NULL
);

/* PASSENGERS TABLE */
CREATE TABLE passengers
(
    id                          serial          PRIMARY KEY,
    first_name                  varchar(30)     NOT NULL,
    last_name                   varchar(30)     NOT NULL,
    dni                         varchar(50)     NOT NULL
);

/* CLASS_TYPES TABLE */
CREATE TABLE class_types
(
    id                          serial          PRIMARY KEY,
    name                        varchar(30)     NOT NULL
);

/* FLIGHTS TABLE */
CREATE TABLE flights
(
    id                          serial          PRIMARY KEY,
    departure_date              date            NOT NULL,
    departure_time              time            NOT NULL,
    arrival_date                time            NOT NULL,
    arrival_time                time            NOT NULL,
    capacity                    integer         NOT NULL,
    airplane_model              varchar(30)     NOT NULL,
    airline_id                  integer         NOT NULL,
    airport_id                  integer         NOT NULL
);

/* AIRLINES TABLE */
CREATE TABLE airlines
(
    id                          serial          PRIMARY KEY,
    name                        varchar(50)     NOT NULL,
    address                     text            NOT NULL,
    score                       float(4)        NOT NULL,
    description                 text            NOT NULL,
    airline_contact_id          integer         NOT NULL                
);

/* AIRLINES_CONTACTS TABLE */
CREATE TABLE airline_contacts
(
    id                          serial          PRIMARY KEY,
    telephone                   varchar(50)     NOT NULL
);

/* AIRPORTS TABLE */
CREATE TABLE airports
(
    id                          serial          PRIMARY KEY,
    name                        varchar(50)     NOT NULL,
    address                     text            NOT NULL,
    city_id                     integer         NOT NULL
);

/*CARS TABLE*/
CREATE TABLE cars 
(
    id                          serial          PRIMARY KEY,
    pick_up_date                date            NOT NULL,
    pick_up_time                time            NOT NULL,
    return_date                 date            NOT NULL,
    return_time                 time            NOT NULL,
    classification              varchar(20)     NOT NULL,
    price                       money           NOT NULL,
    company_id                  integer         NOT NULL
);

/*CAR OPTIONS TABLE*/
CREATE TABLE car_options
(
    id                          serial          PRIMARY KEY,
    name                        varchar(50)     NOT NULL,
    description                 text            NOT NULL
);

/*COMPANIES TABLE*/
CREATE TABLE companies
(
    id                          serial          PRIMARY KEY,
    address                     text            NOT NULL,
    email                       varchar(100)    UNIQUE
);

/*BRANCH OFFICES TABLE*/    
CREATE TABLE branch_offices
(
    id                          serial          PRIMARY KEY,
    address                     text            NOT NULL,
    company_id                  integer         NOT NULL,
    city_id                     integer         NOT NULL
);

/*BRANCH OFFICES CONTACTS TABLE*/
CREATE TABLE branch_offices_contacts
(
    id                          serial          PRIMARY KEY,
    telephone                   varchar(50)     NOT NULL,
    branch_office_id            integer         NOT NULL
);

/*UNAVAILABLE CARS TABLE*/
CREATE TABLE unavailable_cars
(
    id                          serial          PRIMARY KEY,
    date                        date            NOT NULL,
    reservation_id              integer         NOT NULL,
    car_id                      integer         NOT NULL,
    closed                      boolean         NOT NULL

);

/*CAR FLIGHT PACKAGES TABLE*/
CREATE TABLE car_flight_packages
(
    id                          serial          PRIMARY KEY,
    name                        varchar(50)     NOT NULL,
    start_date                  date            NOT NULL,
    start_hour                  time            NOT NULL,
    end_date                    date            NOT NULL,
    end_hour                    time            NOT NULL,
    discount                    float(4)        NOT NULL,
    city_id                     integer         NOT NULL,
    unavailable_car_id          integer         NOT NULL
);

/* ROOM_FLIGHT_PACKAGES TABLE */
CREATE TABLE room_flight_packages
(
    id                          serial          PRIMARY KEY,
    name                        varchar(50)     NOT NULL,
    start_date                  date            NOT NULL,
    start_hour                  time            NOT NULL,
    end_date                    date            NOT NULL,
    end_hour                    time            NOT NULL,
    discount                    integer         NOT NULL,
    unavailable_room_id         integer         NOT NULL,
    city_id                     integer         NOT NULL
);

/* USERS TABLE*/
CREATE TABLE users
(
    id                          serial          PRIMARY KEY,
    email                       varchar(257)    UNIQUE,
    password                    varchar(50)     NOT NULL,
    first_name                  varchar(50)     NOT NULL,
    last_name                   varchar(50)     NOT NULL,
    telephone                   varchar(50)     NULL,
    address                     varchar(50)     NULL,
    current_balance             money           NOT NULL
);

/* USER TYPES TABLE */
CREATE TABLE user_types
(
    id                          serial          PRIMARY KEY,
    name                        varchar(50)     NOT NULL,
    description                 text            NULL
);

/* USER HISTORIES TABLE */
CREATE TABLE user_histories
(
    id                          serial          PRIMARY KEY,
    date                        date            NOT NULL,
    hour                        time            NOT NULL,
    action_type                 varchar(50)     NOT NULL,
    user_id                     integer         NOT NULL
);

/* PAYMENT HISTORIES TABLE */
CREATE TABLE payment_histories
(
    id                          serial          PRIMARY KEY,
    bank_name                   varchar(50)     NOT NULL,
    account_number              varchar(50)     NOT NULL,
    amount                      money           NOT NULL,
    date                        date            NOT NULL,
    hour                        time            NOT NULL,
    user_id                     integer         NOT NULL
);

/* PAYMENT METHODS TABLE */
CREATE TABLE payment_methods
(
    id                          serial          PRIMARY KEY,
    card_name                   varchar(50)     NOT NULL,
    account_number              varchar(30)     NOT NULL,
    expiration_date             date            NOT NULL
);

/* RESERVATIONS TABLE */
CREATE TABLE reservations
(
    id                          serial          PRIMARY KEY,
    date                        date            NOT NULL,
    hour                        time            NOT NULL,
    current_balance             money           NOT NULL,
    new_balance                 money           NOT NULL,
    user_id                     integer         NOT NULL
);

/* CITIES TABLE */
CREATE TABLE cities
(
    id                          serial          PRIMARY KEY,
    name                        varchar(50)     NOT NULL,
    country_id                  integer         NOT NULL
);

/* COUNTRIES TABLE */
CREATE TABLE countries
(
    id                          serial          PRIMARY KEY,
    name                        varchar(50)     NOT NULL
);

/* TRANSFER TABLE */
CREATE TABLE transfers
(
    id                          serial          PRIMARY KEY,
    start_date                  date            NOT NULL,
    start_hour                  time            NOT NULL,
    capacity                    integer         NOT NULL,
    price                       money           NOT NULL,
    hotel_id                    integer         NOT NULL,
    airport_id                  integer         NOT NULL
);

/* TRANSFER CARS TABLE */
CREATE TABLE transfer_cars
(
    id                          serial          PRIMARY KEY,
    vehicle_registration_num    varchar(20)     NOT NULL,
    capacity                    integer         NOT NULL,
    category                    integer         NOT NULL,
    company                     varchar(50)     NOT NULL,
    transfer_id                 integer         NOT NULL
);

/* UNAVAILABLE_ROOMS TABLE*/
CREATE TABLE unavailable_rooms
(
    id                          serial          PRIMARY KEY,
    date                        date            NOT NULL,
    reservation_id              integer         NOT NULL,
    room_id                     integer         NOT NULL,
    closed                      boolean         NOT NULL
);

/* ROOMS TABLE*/
CREATE TABLE rooms
(
    id                          serial          PRIMARY KEY,
    capacity                    integer         NOT NULL,
    adult_price                 money           NOT NULL,
    child_price                 money           NOT NULL,
    description                 text            NOT NULL,
    hotel_id                    integer         NOT NULL
);

/* ROOM_OPTIONS TABLE*/
CREATE TABLE room_options
(
    id                          serial          PRIMARY KEY,
    name                        varchar(50)     NOT NULL,
    feature                     text            NOT NULL
);

/* HOTELS TABLE*/
CREATE TABLE hotels 
(
    id                          serial          PRIMARY KEY,
    name                        varchar(50)     NOT NULL,
    email                       varchar(100)    UNIQUE,
    score                       float(4)        NOT NULL,
    description                 text            NOT NULL,
    city_id                     integer         NOT NULL
);

/* HOTEL_CONTACTS TABLE*/
CREATE TABLE hotel_contacts 
(
    id                          serial          PRIMARY KEY,
    telephone                   varchar(50)     NOT NULL,
    hotel_id                    integer         NOT NULL
);

/* ACTIVITY TABLE */
CREATE TABLE activities 
(
    id                          serial          PRIMARY KEY,
    address                     text            NOT NULL,
    date                        date            NOT NULL,
    hour                        time            NOT NULL,
    price                       money           NOT NULL,
    description                 text            NOT NULL
);
  
/* ----------  MANY-TO-MANY INTERMEDIATE TABLES ---------- */

/* USERS_USER_TYPES TABLE */
CREATE TABLE users_user_types
(
    id                          serial          PRIMARY KEY,
    user_type_id                integer         NOT NULL,
    user_id                     integer         NOT NULL,
    UNIQUE(user_type_id, user_id)
);

/* RESERVATIONS_SEATS TABLE */
CREATE TABLE reservations_seats
(
    id                          serial          PRIMARY KEY,
    seat_id                     integer         NOT NULL,
    reservation_id              integer         NOT NULL,
    closed                      boolean         NOT NULL,
    UNIQUE(seat_id, reservation_id)
);

/* RESERVATIONS_TRANSFERS TABLE*/
CREATE TABLE reservations_transfers
(
    id                          serial          PRIMARY KEY,
    transfer_id                 integer         NOT NULL,
    reservation_id              integer         NOT NULL,
    UNIQUE(transfer_id, reservation_id)
);

/* AIRPORTS_TRANSFERS TABLE */
CREATE TABLE airports_transfers
(
    id                          serial          PRIMARY KEY,
    transfer_id                 integer         NOT NULL,
    airport_id                  integer         NOT NULL,
UNIQUE(transfer_id, airport_id)
);

/* ROOMS_ROOM_OPTIONS TABLE */
CREATE TABLE rooms_room_options
(
    id                          serial          PRIMARY KEY,
    room_option_id             integer         NOT NULL,
    room_id                     integer         NOT NULL,
    UNIQUE(room_option_id , room_id )
);

/* ACTIVITY_RESERVATIONS TABLE */
CREATE TABLE activity_reservations 
(
    id                          serial          PRIMARY KEY,
    activity_id                 integer         NOT NULL,
    reservation_id              integer         NOT NULL,
    closed                      boolean         NOT NULL,
    UNIQUE(activity_id , reservation_id)
);

/* CARS_CAR_OPTIONS TABLE */
CREATE TABLE cars_car_options
(
    id                          serial          PRIMARY KEY,
    car_id                      integer         NOT NULL,
    car_options_id              integer         NOT NULL,
    UNIQUE(car_id, car_options_id)
);

/* ----------------------------- FOREIGN KEY --------------------------- */

/* PAYMENT_HISTORIES FOREIGN KEYS */
ALTER TABLE payment_histories 
ADD CONSTRAINT payment_histories_user_id_foreign
FOREIGN KEY (user_id)
REFERENCES users (id)
ON DELETE CASCADE;

/* USER_HISTORIES FOREIGN KEYS */
ALTER TABLE user_histories 
ADD CONSTRAINT user_histories_user_id_foreign
FOREIGN KEY (user_id)
REFERENCES users (id)
ON DELETE CASCADE;

/* UNAVAILABLE_ROOMS FOREIGN KEYS */
ALTER TABLE unavailable_rooms
ADD CONSTRAINT unavailable_rooms_reservation_id_foreign
FOREIGN KEY (reservation_id)
REFERENCES reservations(id)
ON DELETE CASCADE;

ALTER TABLE unavailable_rooms
ADD CONSTRAINT unavailable_rooms_room_id_foreign
FOREIGN KEY (room_id)
REFERENCES rooms(id)
ON DELETE CASCADE;

/* ROOMS FOREIGN KEYS */
ALTER TABLE rooms
ADD CONSTRAINT rooms_hotel_id_foreign
FOREIGN KEY (hotel_id)
REFERENCES hotels (id)
ON DELETE CASCADE;

/* HOTELS FOREIGN KEYS */
ALTER TABLE hotels
ADD CONSTRAINT hotel_city_id_foreign
FOREIGN KEY (city_id)
REFERENCES cities (id)
ON DELETE CASCADE;

/* HOTEL_CONCACTS FOREIGN KEYS */
ALTER TABLE hotel_contacts
ADD CONSTRAINT hotel_contacts_hotel_id_foreign
FOREIGN KEY (hotel_id)
REFERENCES hotels(id)
ON DELETE CASCADE;

/* UNAVAILABLE_CARS FOREIGN KEYS*/
ALTER TABLE unavailable_cars
ADD CONSTRAINT unavailable_cars_reservation_id_foreign
FOREIGN KEY (reservation_id)
REFERENCES reservations(id)
ON DELETE CASCADE;

ALTER TABLE unavailable_cars
ADD CONSTRAINT unavailable_cars_car_id_foreign
FOREIGN KEY (car_id)
REFERENCES cars(id)
ON DELETE CASCADE;

/*CARS FOREIGN KEYS*/
ALTER TABLE cars
ADD CONSTRAINT cars_company_id_foreign
FOREIGN KEY (company_id)
REFERENCES companies(id)
ON DELETE CASCADE;

/* BRANCH_OFFICES FOREIGN KEYS*/
ALTER TABLE branch_offices
ADD CONSTRAINT branch_offices_company_id_foreign
FOREIGN KEY (company_id)
REFERENCES companies(id)
ON DELETE CASCADE;

ALTER TABLE branch_offices
ADD CONSTRAINT branch_offices_city_id_foreign
FOREIGN KEY (city_id)
REFERENCES cities(id)
ON DELETE CASCADE;

/* BRANCH_OFFICES_CONTACTS FOREIGN KEYS*/
ALTER TABLE branch_offices_contacts
ADD CONSTRAINT branch_offices_contacts_branch_office_id_foreign
FOREIGN KEY (branch_office_id)
REFERENCES branch_offices(id)
ON DELETE CASCADE;

/* RESERVATIONS FOREIGN KEYS */
ALTER TABLE reservations
ADD CONSTRAINT reservations_user_id_foreign
FOREIGN KEY (user_id)
REFERENCES users(id)
ON DELETE CASCADE;

/* ROOM_FLIGHT_PACKAGES FOREIGN KEYS */
ALTER TABLE room_flight_packages
ADD CONSTRAINT room_flight_packages_unavailable_room_id_foreign
FOREIGN KEY (unavailable_room_id)
REFERENCES unavailable_rooms(id)
ON DELETE CASCADE;

ALTER TABLE room_flight_packages
ADD CONSTRAINT room_flight_packages_city_id_foreign
FOREIGN KEY (city_id)
REFERENCES cities(id)
ON DELETE CASCADE;

/* CAR_FLIGHT_PACKAGES FOREIGN KEYS */
ALTER TABLE car_flight_packages
ADD CONSTRAINT car_flight_packages_unavailable_car_id_foreign
FOREIGN KEY (unavailable_car_id)
REFERENCES unavailable_cars(id)
ON DELETE CASCADE;

ALTER TABLE car_flight_packages
ADD CONSTRAINT car_flight_packages_city_id_foreign
FOREIGN KEY (city_id)
REFERENCES cities (id)
ON DELETE CASCADE;

/* CITIES FOREIGN KEYS */
ALTER TABLE cities
ADD CONSTRAINT cities_country_id_foreign
FOREIGN KEY (country_id)
REFERENCES countries (id)
ON DELETE CASCADE;

/* TRANSFER FOREIGN KEYS */
ALTER TABLE transfers
ADD CONSTRAINT transfers_hotel_id_foreign
FOREIGN KEY (hotel_id)
REFERENCES hotels (id)
ON DELETE CASCADE;

ALTER TABLE transfers
ADD CONSTRAINT transfers_airport_id_foreign
FOREIGN KEY (airport_id)
REFERENCES airports (id)
ON DELETE CASCADE;


/* TRANSFER_CARS FOREIGN KEYS */
ALTER TABLE transfer_cars
ADD CONSTRAINT transfer_cars_transfer_id_foreign
FOREIGN KEY (transfer_id)
REFERENCES transfers (id)
ON DELETE CASCADE;

/* SEATS FOREIGN KEYS */
ALTER TABLE seats
ADD CONSTRAINT seats_passenger_id_foreign
FOREIGN KEY (passenger_id)
REFERENCES passengers(id)
ON DELETE CASCADE;

ALTER TABLE seats
ADD CONSTRAINT seats_class_type_id_foreign
FOREIGN KEY (class_type_id)
REFERENCES class_types(id)
ON DELETE CASCADE;

ALTER TABLE seats
ADD CONSTRAINT seats_flight_id_foreign
FOREIGN KEY (flight_id)
REFERENCES flights(id)
ON DELETE CASCADE;

/* FLIGHTS FOREIGN KEYS */
ALTER TABLE flights
ADD CONSTRAINT flights_airline_id_foreign
FOREIGN KEY (airline_id)
REFERENCES airlines(id)
ON DELETE CASCADE;

ALTER TABLE flights
ADD CONSTRAINT flights_airport_id_foreign
FOREIGN KEY (airport_id)
REFERENCES airports(id)
ON DELETE CASCADE;

/* AIRLINES FOREIGN KEYS */
ALTER TABLE airlines
ADD CONSTRAINT airlines_airline_contact_id_foreign
FOREIGN KEY (airline_contact_id)
REFERENCES airline_contacts(id)
ON DELETE CASCADE;

/* AIRPORTS FOREIGN KEYS */
ALTER TABLE airports
ADD CONSTRAINT airports_cityid_foreign
FOREIGN KEY (city_id)
REFERENCES cities(id)
ON DELETE CASCADE;

/* ----------- MANY-TO-MANY INTERMEDIATE TABLE FOREIGN KEYS ----------- */

/* USERS_USER_TYPES FOREIGN KEYS */
ALTER TABLE users_user_types
ADD CONSTRAINT users_user_types_user_type_id_foreign
FOREIGN KEY (user_type_id)
REFERENCES user_types (id)
ON DELETE CASCADE;

ALTER TABLE users_user_types
ADD CONSTRAINT users_user_types_user_id_foreign
FOREIGN KEY (user_id)
REFERENCES users (id)
ON DELETE CASCADE;

/* RESERVATIONS_SEATS FOREIGN KEYS */
ALTER TABLE reservations_seats
ADD CONSTRAINT reservations_seats_seat_id_foreign
FOREIGN KEY (seat_id)
REFERENCES seats (id)
ON DELETE CASCADE;

ALTER TABLE reservations_seats
ADD CONSTRAINT reservations_seats_reservation_id_foreign
FOREIGN KEY (reservation_id)
REFERENCES reservations (id)
ON DELETE CASCADE;

/* RESERVATIONS_TRANSFERS FOREIGN KEYS */
ALTER TABLE reservations_transfers
ADD CONSTRAINT reservations_transfers_reservation_id_foreign
FOREIGN KEY (reservation_id)
REFERENCES reservations (id)
ON DELETE CASCADE;

ALTER TABLE reservations_transfers
ADD CONSTRAINT reservations_transfers_transfer_id_foreign
FOREIGN KEY (transfer_id)
REFERENCES transfers (id)
ON DELETE CASCADE;

/* AIRPORT_TRANSFERS FOREIGN KEYS */
ALTER TABLE airports_transfers
ADD CONSTRAINT airports_transfers_transfer_id_foreign
FOREIGN KEY (transfer_id)
REFERENCES transfers (id)
ON DELETE CASCADE;

ALTER TABLE airports_transfers
ADD CONSTRAINT airports_transfers_airport_id_foreign
FOREIGN KEY (airport_id)
REFERENCES airports (id)
ON DELETE CASCADE;

/* ROOMS_ROOM_OPTIONS FOREIGN KEYS */
ALTER TABLE rooms_room_options
ADD CONSTRAINT rooms_room_options_room_id_foreign
FOREIGN KEY (room_id)
REFERENCES rooms (id)
ON DELETE CASCADE;

ALTER TABLE rooms_room_options
ADD CONSTRAINT rooms_room_options_room_option_id_foreign
FOREIGN KEY (room_option_id)
REFERENCES room_options (id)
ON DELETE CASCADE;

/* ACTIVITY_RESERVATIONS FOREIGN KEYS */
ALTER TABLE activity_reservations
ADD CONSTRAINT activity_reservations_activity_id_foreign
FOREIGN KEY (activity_id)
REFERENCES activities (id)
ON DELETE CASCADE;

ALTER TABLE activity_reservations
ADD CONSTRAINT activity_reservations_reservation_id_foreign
FOREIGN KEY (reservation_id)
REFERENCES reservations (id)
ON DELETE CASCADE;

/* CARS_CAR_OPTIONS FOREIGN KEYS */
ALTER TABLE cars_car_options
ADD CONSTRAINT cars_car_options_car_id_foreign
FOREIGN KEY (car_id)
REFERENCES cars (id)
ON DELETE CASCADE;

ALTER TABLE cars_car_options
ADD CONSTRAINT cars_car_options_car_options_id_foreign
FOREIGN KEY (car_options_id)
REFERENCES car_options (id)
ON DELETE CASCADE;


INSERT INTO user_types (name, description) VALUES ('admin', 'admin is a GOD');
INSERT INTO user_types (name, description) VALUES ('user', 'user is SLAVE');