Client Table:
    -ClientID(Autoincrement) (PK)
    -ClientName
    -ClientSurname
    -Username (Unique)
    -Email
    -Gender
    -Phone
    -Password
    -Type
    -ProfileImage
    -Review
    -Rating
    

Country Table:
    -CountryID (Autoincrement) (PK)
    -CountryName
    -CountryInfo
    -CountryImage

Destination Table:
    -DestinationID (Autoincrement) (PK)
    -DestinationName
    -DestinationInfo
    -DestinationImage
    -DestinationPrice
    -StartDate
    -EndDate
    -Type
    -Revenue
    -CountryID (FK)


Booking Table:
    -BookingID (Autoincrement) (PK)
    -ClientSpendings 
    -Reviews
    -ClientID (FK)
    -DestinationID(FK)
  
    

    