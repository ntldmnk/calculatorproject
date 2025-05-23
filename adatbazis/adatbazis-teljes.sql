CREATE TABLE osszetevok(
    osszetevoID int NOT NULL,
    osszetevoNev varchar(100) NOT NULL,
    osszetevoTipus varchar(30),
    osszetevoEnergia int,
    osszetevoFeherje float,
    osszetevoZsir float,
    osszetevoSzenhidrat float,
    CONSTRAINT pk_OsszetevoKulcs PRIMARY KEY (osszetevoID)
);

CREATE TABLE koretek(
    koretID int NOT NULL,
    koretNev varchar(100) NOT NULL,
    koretEnergia int,
    koretFeherje float,
    koretZsir float,
    koretSzenhidrat float,
    koretVegan boolean,
    CONSTRAINT pk_KoretKulcs PRIMARY KEY (koretID)
);

CREATE TABLE koret_osszetevo_kapcsolatok(
    KO_koretKulsoID int,
    KO_osszetevoKulsoID int,
    CONSTRAINT fk_KO_SegedKoretKulcs FOREIGN KEY (KO_koretKulsoID) REFERENCES koretek(koretID),
    CONSTRAINT fk_KO_SegedOsszetevoKulcs_Koret FOREIGN KEY (KO_osszetevoKulsoID) REFERENCES osszetevok(osszetevoID)
);

CREATE TABLE etelek(
    etelID int NOT NULL,
    etelNev varchar(100) NOT NULL,
    etelEnergia int,
    etelFeherje float,
    etelZsir float,
    etelSzenhidrat float,
    etelVegan boolean,
    CONSTRAINT pk_EtelKulcs PRIMARY KEY (etelID)
);

CREATE TABLE etel_osszetevo_kapcsolatok(
    EO_etelKulsoID int,
    EO_osszetevoKulsoID int,
    CONSTRAINT fk_EO_SegedEtelKulcs FOREIGN KEY (EO_etelKulsoID) REFERENCES etelek(etelID),
    CONSTRAINT fk_EO_SegedOsszetevoKulcs_Etel FOREIGN KEY (EO_osszetevoKulsoID) REFERENCES osszetevok(osszetevoID)
);

CREATE TABLE etel_koret_kapcsolatok(
    EK_etelKulsoID int,
    EK_koretKulsoID int,
    CONSTRAINT fk_EK_SegedEtelKulcs FOREIGN KEY (EK_etelKulsoID) REFERENCES etelek(etelID),
    CONSTRAINT fk_EK_SegedKoretKulcs FOREIGN KEY (EK_koretKulsoID) REFERENCES koretek(koretID)
);

CREATE TABLE regisztraciok(
    regisztracioID int NOT NULL,
    email varchar(255) UNIQUE NOT NULL,
    jelszo varchar(255) NOT NULL,
    felhasznaloNev varchar(30) UNIQUE NOT NULL,
    testsuly float,
    testmagassag int,
    eletkor int,
    CONSTRAINT pk_RegisztacioKulcs PRIMARY KEY (regisztracioID)
);

CREATE TABLE etkezesiNaplok(
    etkezesiNaploID int NOT NULL,
    etkezesiNaploNev varchar(30),
    felhasznaloForeignID int,
    etelekForeignID int,
    koretekForeignID int,
    naplozasiDatum date DEFAULT CURRENT_TIMESTAMP,
    etkezesEnergia float,
    etkezesFeherje float,
    etkezesZsir float,
    etkezesSzenhidrat float,
    CONSTRAINT pk_NaplozasiKulcs PRIMARY KEY (naploID),
    CONSTRAINT fk_FelhasznaloKulsoKulcs FOREIGN KEY (felhasznaloForeignID) REFERENCES regisztraciok(regisztracioID),
    CONSTRAINT fk_EtelKulsoKulcs FOREIGN KEY (etelForeignID) REFERENCES etel_koret_kapcsolatok(EK_etelKulsoID),
    CONSTRAINT fk_KoretKulsoKulcs FOREIGN KEY (koretForeignID) REFERENCES etel_koret_kapcsolatok(EK_koretKulsoID)
);

INSERT INTO osszetevok VALUES
    (1, "Paradicsom", "Zöldség", 18, 0.9, 0.2, 1.3),
    (2, "Uborka", "Zöldség", 11, 0.3, 0.2, 1.1),
    (3, "Saláta", "Zöldség", 15, 1.4, 0.2, 1.6),
    (4, "Lilahagyma", "Zöldség", 42, 0.9, 0.1, 10.1),
    (5, "Vöröshagyma", "Zöldség", 40, 1.1, 0.1, 7.6),
    (6, "Újhagyma", "Zöldség", 32, 1.8, 0.2, 4.7),
    (7, "Burgonya", "Zöldség", 77, 2.1, 0.1, 15.4),
    (8, "Paprika", "Zöldség", 27, 1.0, 0.2, 5.4),
    (9, "Zöldpaprika", "Zöldség", 20, 0.9, 0.2, 2.9),
    (10, "Barna gomba", "Zöldség", 22, 2.5, 0.1, 3.7),
    (11, "Csiperkegomba", "Zöldség", 22, 3.1, 0.3, 2.3),
    (12, "Rókagomba", "Zöldség", 38, 1.5, 0.5, 3.1),
    (13, "Shiitake gomba", "Zöldség", 34, 2.2, 0.5, 4.3),
    (14, "Spárga", "Zöldség", 20, 2.2, 0.1, 1.8),
    (15, "Sárgarépa", "Zöldség", 41, 0.9, 0.2, 6.8),
    (16, "Brokkoli", "Zöldség", 34, 2.8, 0.4, 4.0),
    (17, "Fokhagyma", "Zöldség", 4, 0.2, 0, 0.9),
    (18, "Zöldborsó", "Zöldség", 81, 5.4, 0.4, 8.8),
    (19, "Tök", "Zöldség", 16, 1.2, 0.2, 2.3),
    (20, "Avokádó", "Zöldség", 160, 2, 14.7, 1.8),
    (21, "Kukorica", "Zöldség", 97, 3.3, 1.4, 19),
    (22, "Csirkeszárny", "Hús", 126, 22, 3.5, 0),
    (23, "Csirkemell", "Hús", 120, 22.5, 2.6, 0),
    (24, "Csirkecomb", "Hús", 119, 19.5, 3.9, 0),
    (25, "Csirkemáj", "Hús", 119, 16.9, 4.8, 0.7),
    (26, "Csirkezúza", "Hús", 94, 17.7, 2.1, 0),
    (27, "Sertéstarja", "Hús", 132, 18.7, 5.7, 0),
    (28, "Hosszú karaj", "Hús", 155, 21.6, 6.9, 0),
    (29, "Rövid karaj", "Hús", 133, 22.5, 4.1, 0),
    (30, "Sertéscomb", "Hús", 136, 20.5, 5.4, 0),
    (31, "Sertéslapocka", "Hús", 148, 19.6, 7.1, 0),
    (32, "Sertésláb", "Hús", 140, 11.6, 10, 0),
    (33, "Sertés oldalas", "Hús", 277, 15.47, 23.4, 0),
    (34, "Marhatarja", "Hús", 216, 25.7, 11.7, 0),
    (35, "Marha magas hátszín", "Hús", 154, 21.9, 7.4, 0),
    (36, "Marhafartő", "Hús", 195, 20.6, 11.9, 0),
    (37, "Marhalapocka", "Hús", 152, 20.1, 8.1, 0),
    (38, "Marhafelsál", "Hús", 149, 21.72, 6.29, 0),
    (39, "Marhalábszár", "Hús", 128, 21.8, 3.9, 0),
    (40, "Tonhal", "Hús", 144, 23.3, 4.9, 0),
    (41, "Lazac", "Hús", 131, 22.3, 4.7, 0),
    (42, "Hekk", "Hús", 89, 20.2, 0.9, 0),
    (43, "Ponty", "Hús", 127, 17.8, 5.6, 0),
    (44, "Harcsa", "Hús", 95, 16.4, 2.8, 0),
    (45, "Tőkehal", "Hús", 72, 17.5, 0.2, 0),
    (46, "Garnélarák", "Hús", 85, 20.1, 0.5, 0),
    (47, "Pisztráng", "Hús", 110, 21.2, 2.7, 0),
    (48, "Tehéntej(2,8%)", "Tejtermék", 56, 3, 2.8, 4.6),
    (49, "Vaj", "Tejtermék", 742, 0.4, 80, 0.5),
    (50, "Tejföl", "Tejtermék", 207, 2.5, 20, 3.8),
    (51, "Tyúktojás", "Tojás", 143, 12.6, 9.5, 0.7),
    (52, "Fürjtojás", "Tojás", 158, 13.1, 11.1, 0.4),
    (53, "Strucctojás", "Tojás", 163, 21, 8.8, 0),
    (54, "Majonéz", "Szósz", 128, 0.2, 13.6, 1),
    (55, "Feta sajt", "Tejtermék", 264, 14.2, 21.3, 4.1),
    (56, "Lasagne tészta", "Tészta", 355, 12.5, 1.4, 73),
    (57, "parmezán sajt", "Tejtermék", 392, 35.8, 25.8, 3.2),
    (58, "Betűtészta", "Tészta", 312, 10, 2.7, 61.9);

INSERT INTO koretek VALUES
    (1, "Üres", 0, 0, 0, 0, 0),
    (2, "Fehér rizs", 360, 6.6, 0.6, 77.9, 1),
    (3, "Krumplipüré", 71, 1.8, 1.4, 13.1, 1),
    (4, "Barna rizs", 362, 7.5, 2.7, 72.8, 1),
    (5, "Krokett", 239, 5.5, 11.5, 26.5, 1),
    (6, "Hasábburgonya", 150, 2.2, 4.7, 24.8, 1),
    (7, "Spagetti tészta", 158, 5.8, 0.9, 29.1, 1),
    (8, "Nokedli", 214, 7.8, 3.4, 37.2, 1),
    (9, "Párolt lilakáposzta", 60, 1.3, 3.3, 7.3, 1),
    (10, "Bulgur", 342, 12.3, 1.3, 75.8, 1),
    (11, "Puliszka", 121, 5.2, 6.6, 9.4, 1),
    (12, "Párolt zöldségköret", 107, 2.8, 6.7, 7.8, 1),
    (13, "Kenyér", 267, 8.2, 3.6, 49.6, 1),
    (14, "Knédli", 212, 6.8, 1.6, 42.5, 1),
    (15, "Kuszkusz", 112, 3.8, 0.2, 21.8, 1),
    (16, "Rizi-bizi", 139, 2.9, 2.6, 25.4, 1),
    (17, "Krumplisaláta", 149, 0.7, 12.1, 8.7, 1),
    (18, "Cézár saláta", 146, 3.1, 12, 5.9, 1),
    (19, "Görög saláta", 66, 2.9, 4.4, 4.6, 1),
    (20, "Kukorica saláta", 194, 2.4, 14.1, 14.8, 1),
    (21, "Hagymás törtkrumpli", 112, 1.6, 3.7, 19.4, 1),
    (22, "Szarvacska tészta", 360, 12.2, 2.1, 73.6, 1);

INSERT INTO koret_osszetevo_kapcsolatok VALUES
    (3, 7),
    (3, 49),
    (3, 50),
    (17, 4),
    (17, 7),
    (17, 50),
    (17, 51),
    (17, 54),
    (18, 1),
    (18, 2),
    (18, 3),
    (19, 1),
    (19, 2),
    (19, 4),
    (19, 55),
    (20, 21),
    (20, 50),
    (20, 54);

INSERT INTO etelek VALUES
    (1, "Üres", 0, 0, 0, 0, 0),
    (2, "Lecsó", 31, 0.9, 0.8, 5.8, 1),
    (3, "Lasagne", 194, 10.4, 9.6, 16.4, 0),
    (4, "Bolognai spagetti", 150, 7, 6.1, 14.6, 0),
    (5, "Töltött paprika", 71, 3.9, 3.1, 7.2, 0),
    (6, "Paradicsomleves", 58, 2.2, 1.1, 9.5, 1),
    (7, "Tejfölös gombapörkölt", 127, 4.5, 10.4, 4, 1),
    (8, "Gombapaprikás", 95, 4.1, 5.9, 6.7, 1),
    (9, "Rántott gomba", 230, 7.4, 10.7, 25.5, 1),
    (10, "Gombakrémleves", 96, 4.6, 6.7, 4.2, 1),
    (11, "Gombás tejszínes csirkemell", 111, 12.4, 5.6, 2.1, 0),
    (12, "Rántott csirkemell", 357, 13.6, 27.8, 12.7, 0),
    (13, "Zöldséges csirkeragu", 71, 7.3, 2.4, 4.8, 0),
    (14, "Tejfölös csirkepaprikás", 117, 7.5, 8.3, 2.8, 0),
    (15, "Gyros pitában", 157, 11.6, 17.6, 4.1, 0),
    (16, "Margeríta pizza", 359, 3.7, 20.1, 42.2, 1),
    (17, "Szalámis pizza", 218, 7.5, 6.8, 31.4, 0),
    (18, "Mézes-mustáros csirekemell", 128, 15.6, 3.6, 8, 0),
    (19, "Töltött káposzta", 187, 14, 11.2, 7.6, 0),
    (20, "Sertés fasírt", 165, 10.1, 9.7, 8.9, 0),
    (21, "Csirkemell fasírt", 156, 10.7, 9.9, 5.8, 0),
    (22, "Sertés kocsonya", 116, 6.8, 9.1, 1.2, 0),
    (23, "Csirkemell dubarry", 162, 8.1, 12.1, 4.3, 0),
    (24, "Sárgaborsó főzelék", 136, 7.7, 0.7, 20.8, 1),
    (25, "Zöldborső főzelék", 58, 3.6, 0.9, 11.6, 1),
    (26, "Babfőzelék", 109, 6.1, 2.3, 16.6, 1),
    (27, "Lencsefőzelék", 128, 8, 2.3, 18.9, 1),
    (28, "Babgulyás", 114, 6.4, 5.5, 9.9, 0),
    (29, "Bécsi szelet", 179, 18.8, 6.2, 11.2, 0),
    (30, "Csilis bab", 114, 6.7, 4.3, 12.1, 0),
    (31, "Vadas marha", 166, 7.8, 11.3, 8.1, 0),
    (32, "Sushi", 135, 3.5, 2.9, 25.9, 0);

INSERT INTO etel_koret_kapcsolatok VALUES
    (1, 1),
    (2, 1),
    (3, 7),
    (4, 13),
    (5, 1),
    (6, 8),
    (7, 8),
    (8, 5),
    (9, 1),
    (10, 2),
    (11, 3),
    (12, 2),
    (13, 8),
    (14, 1),
    (15, 1),
    (17, 22),
    (18, 13),
    (19, 3),
    (20, 3),
    (21, 13),
    (22, 2),
    (23, 1),
    (24, 1),
    (25, 1),
    (26, 1),
    (27, 13),
    (28, 6),
    (29, 13),
    (30, 8),
    (31, 1);

INSERT INTO regisztraciok VALUES
    (1, "gergo@test.com", "GeriBelep", "Geri", 80, 175, 18),
    (2, "dominik@test.com", "DominikBelep", "Dominik", 60, 175, 19),
    (3, "robi@test.com", "RobiBelep", "Robi", 65, 175, 18);

INSERT INTO etkezesiNaplok VALUES
    (1, default, 3, 11, 3, default, 0, 0, 0, 0),
    (2, default, 1, 17, 2, default, 0, 0, 0, 0),
    (3, "pecek", 2, 2, 1, default, 0, 0, 0, 0);