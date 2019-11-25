

Alter Table RESERVATION
ADD CONSTRAINT FK_RESERVATION_ID
FOREIGN KEY (IDpersonne) REFERENCES UTILISATEUR(IDpersonne),

ADD CONSTRAINT FK_RESERVATION_PLACE
FOREIGN KEY (NumPlace) REFERENCES PLACE(NUmPlace);

Alter Table UTILISATEUR

ADD CONSTRAINT FK_UTILISATEUR_LIGUE
FOREIGN KEY (IdLigue) REFERENCES LIGUE(NumLigue);


Alter Table LISTEATTENTE
ADD CONSTRAINT FK_LISTEATTENTE_ID
FOREIGN KEY (IDpersonne) REFERENCES UTILISATEUR(IDpersonne);

