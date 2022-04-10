-- USERS TABLE ------------------------>

-- @block
CREATE TABLE Users(
    id INT PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(255) NOT NULL UNIQUE,
    bio TEXT,
    country VARCHAR(2)
);


-- @block
INSERT INTO Users (email, bio, country)
VALUES
    ("Francesco@Ferrante.it", "I like C++", "IT"),
    ("Giuseppe@Rossi.com", "I like PHP", "US"),
    ("Mario@Verdi.it", "I like SQL", "EN")
    ("Andrea@Bianchi.de", "I like Java", "DE")
    ("Marco@Rossi.it", "I also like C++", "IT"),
    ("Luca@Verdi.com", "I like PHP", "US"),
    ("Jhon@Doe.us", "I like SQL", "US"),
    ("Salvatore@Fermi.it", "I like Javascript", "IT");


-- @block
SELECT * FROM Users;


-- @block
SELECT id, email FROM Users
ORDER BY id DESC LIMIT 3;


-- @block
SELECT email, id FROM Users
WHERE country = 'IT'
ORDER BY id ASC
LIMIT 2;


-- @block
SELECT email, id FROM Users
WHERE country = 'IT' AND id % 2 = 0
ORDER BY id ASC


-- @block
SELECT email, id FROM Users
WHERE country = 'IT' OR id % 2 = 0
ORDER BY id ASC


-- @block
SELECT email, id, country FROM Users
WHERE email LIKE '%.it';


-- @block
CREATE INDEX email_index ON Users(email);

-- END USERS TABLE ------------------------>


-- ROOMS TABLE ----------------------------->

-- @block
CREATE TABLE Rooms (
    id INT AUTO_INCREMENT,
    owner_id INT NOT NULL,
    street VARCHAR(255),
    PRIMARY KEY(id),
    -- con FOREIGN KEY(column) REFERENCES table(column) creiamo una relazione
    -- tra una colonna in questa tabella [FOREIGN KEY(column)] ed una in un
    -- altra tabella [REFERENCES table(column)]. Creando questa relazione evitiamo
    -- anche di cancellare dati che riguardano la relazione, ad esempio non 
    -- possiamo cancellare nessun utente che abbia qualche stanza perchè sono 
    -- in relazione
    FOREIGN KEY(owner_id) REFERENCES Users(id)
);


-- @block
INSERT INTO Rooms (owner_id, street)
VALUES
    (1, 'Via Manzoni 45 Monza'),
    (1, 'Via Enrico Fermi 32 Muggiò'),
    (1, 'Corso Milano Monza'),
    (4, 'Via T. Edison 12 Milano'),
    (4, 'Via T. Edison 22 Milano');


-- @block
SELECT Users.id as user_id, Rooms.id as room_id, email, street
FROM Users LEFT JOIN Rooms ON Users.id = Rooms.owner_id;