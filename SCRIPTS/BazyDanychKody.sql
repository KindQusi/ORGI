--    1. TABELE
-- A. Baza użytkowników 

CREATE TABLE Uzytkownicy (
ID      INT          NOT Null AUTO_INCREMENT,
Nick    VARCHAR(20)  NOT Null,
Haslo   VARCHAR(256) NOT Null,
Email   VARCHAR(50)  NOT Null,
-- Pierwsza kategoria
SumOfPhoto       INT NOT NULL,
-- Druga kategoria
SumOfEfect       INT NOT NULL,
SumOfBgmusic     INT NOT NULL,
SumOfPlay        INT NOT NULL,
SumOfReportage   INT NOT NULL,
-- Trzecia kategoria
SumOfColumns     INT NOT NULL,
SumOfStories     INT NOT NULL,
SumOfPoem        INT NOT NULL,
PRIMARY KEY (ID)
)

-- B. v2 Baza wrzuconych rzeczy
-- Każda kategoria będzie przechowywana osobno
-- Tu będziemy mieli informację o:  
-- Kto co wrzucił i info o samym wrzucie
-- Przechowywane będą w folderach

-- Może dodać ile razy pobrane?
-- Zdjęcia maxymalna ilość tagów

{Zdjecia/Sluchowiska itp}
CREATE TABLE zdjecia (
ID          INT          NOT NULL AUTO_INCREMENT,
ID_USER     INT          NOT NULL, -- Osoba dodajaca
NazwaPliku  VARCHAR(30)  NOT NULL,
Typ         VARCHAR(30)  NOT NULL,
Opis        TEXT         NOT NULL, -- longtxt?
Tag         VARCHAR(40)  NOT NULL,
Tag1        VARCHAR(40) ,
Tag2        VARCHAR(40) ,
Tag3        VARCHAR(40) ,
Tag4        VARCHAR(40) ,
Tag5        VARCHAR(40) ,
Ile_pobran  INT         NOT NULL, 
PRIMARY KEY (ID),
FOREIGN KEY(ID_USER) REFERENCES Uzytkownicy(ID)
);

--    2. ZAPYTANIA
-- A.  Użytkownicy którzy mają konkretny email 
SELECT * FROM user WHERE Email="."

-- B. Wstawianie nowego użytkownika

INSERT INTO `uzytkownik`
(`Nick`,`Haslo`,`Email`) 
VALUES 
('qusi','123','testemail')

"INSERT INTO 
`{$usersTable}`
(`{$loginCol}`,`{$passCol}`,`{$emailCol}`)           
VALUES 
('{$UserNick}','{$pass_hash}','{$UserEmail}')";

INSERT INTO uzytkownik 
(Nick, Haslo, Email) 
VALUES
('Tomek21', 'qwe123', 'axeblast99@gmail.om');