
drop database if exists airlineDB ;
create database airlineDB;

CREATE TABLE Airport(
AirportName   VARCHAR(40) NOT NULL,
AirportCode   CHAR(3) NOT NULL,
AirportCity   VARCHAR(40),
AirportProvince VARCHAR(40),
PRIMARY KEY(AirportCode)
);

CREATE TABLE Airline(
AirlineName   VARCHAR(40) NOT NULL,
AirlineCode   CHAR(2) NOT NULL,
PRIMARY KEY(AirlineCode)
);

CREATE TABLE AirplaneType(
AirplaneTypeName VARCHAR(4) NOT NULL,
AirplaneTypeMaxNumberOfSeats INTEGER,
AirplaneTypeCompany VARCHAR(15),
PRIMARY KEY(AirplaneTypeName)
);

CREATE TABLE Airplane(
AirlineCode   VARCHAR(2) NOT NULL,
AirplaneTypeName VARCHAR(4) NOT NULL,
AirplaneID   VARCHAR(10) NOT NULL,
AirplaneYear SMALLINT,
PRIMARY KEY(AirplaneID),
FOREIGN KEY(AirplaneTypeName) REFERENCES AirplaneType(AirplaneTypeName) ON DELETE CASCADE,
FOREIGN KEY(AirlineCode) REFERENCES Airline(AirlineCode) ON DELETE CASCADE
);

CREATE TABLE Flight(
AirplaneID  VARCHAR(10) NOT NULL,
ArrivalAirportCode CHAR(3) NOT NULL,
ExpectedArrivalTime DATETIME,
ActualArrivalTime DATETIME,
DepartureAirportCode CHAR(3) NOT NULL,
ExpectedDepartureTime DATETIME,
ActualDepartureTime DATETIME,
FlightNumber CHAR(3) NOT NULL,
AirlineCode CHAR(2) NOT NULL,
PRIMARY KEY(AirlineCode, FlightNumber),
FOREIGN KEY(AirlineCode) REFERENCES Airline(AirlineCode) ON DELETE CASCADE,
FOREIGN KEY(ArrivalAirportCode) REFERENCES Airport(AirportCode) ON DELETE CASCADE,
FOREIGN KEY(DepartureAirportCode) REFERENCES Airport(AirportCode) ON DELETE CASCADE,
FOREIGN KEY(AirplaneID) REFERENCES Airplane(AirplaneID) ON DELETE CASCADE
);

CREATE TABLE Handles(
AirportCode   CHAR(3) NOT NULL,
AirplaneTypeName VARCHAR(4) NOT NULL,
PRIMARY KEY(AirportCode, AirplaneTypeName),
FOREIGN KEY(AirportCode) REFERENCES Airport(AirportCode) ON DELETE CASCADE,
FOREIGN KEY(AirplaneTypeName) REFERENCES AirplaneType(AirplaneTypeName) ON DELETE CASCADE
);

CREATE TABLE FlightDays(
FlightDayOffered DATE NOT NULL,
FlightNumber CHAR(3) NOT NULL,
AirlineCode CHAR(2) NOT NULL,
PRIMARY KEY(FlightDayOffered, AirlineCode, FlightNumber),
FOREIGN KEY(AirlineCode, FlightNumber) REFERENCES Flight(AirlineCode, FlightNumber) ON DELETE CASCADE
);

insert into Airport values
('Toronto Pearson International Airport', 'YYZ', 'Toronto', 'ON'),
('Tokyo Haneda Airport', 'DXB', 'Tokyo', null),
('Berlin Brandenburg Airport', 'BER', 'Berlin', 'Brandenburg')
;

insert into Airline values
('Air Canada', 'AC'),
('Japan Airlines', 'JA'),
('Deutsche Lufthansa', 'AG')
;

insert into AirplaneType values
('AC13', 100, 'Albatross'),
('AX24', 200, 'Boeing'),
('DC53', 300, null)
;

insert into Airplane values
('AC', 'AC13', '123456789', 1999),
('JA', 'AX24', '153959389', null),
('AG', 'DC53', '923556639', 2012)
;

insert into Flight values
('123456789', 'BER', '2021-04-20 07:15:00', '2021-04-20 07:15:00', 'YYZ', null, null, '696', 'AC'),
('153959389', 'BER', '2021-04-21 18:45:00', '2021-04-21 18:45:00', 'DXB', null, null, '473', 'JA'),
('923556639', 'DXB', '2021-04-22 21:00:00', '2021-04-22 21:00:00', 'YYZ', null, null, '293', 'AG')
;

insert into Handles values
('YYZ', 'AC13'),
('DXB', 'AX24'),
('BER', 'DC53')
;

insert into FlightDays values
('1966-04-05', '696', 'AC'),
('1999-22-29', '696', 'AC'),
('1963-10-25', '293', 'AG')
;
