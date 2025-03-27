# BETA DE LA BASE


Table Usuarios {
    ID          int [primary key]
    nombre_com  varchar(250)
    genero      enum("H","M")
    rol  enum('1', '2', '3') // 1 admin, 2 maestro y 3 estu
}

Table Maestros {
    ID          int [primary key]
    DUI         int (30)
    NIP         int (20)
    nombre_com  varchar(250)
    genero      enum("H","M")
    telefono    varchar (15)
    email       varchar(250)
}

Table Alumnos {
    ID          int [primary key]
    NIE         int (25)
    nombre_com  varchar(250)
    genero      enum("H","M")
    correo      varchar(250)
    email       varchar(250)
    telefono    varchar (15)
}

Table Materias {
    ID          int [primary key]
    nombre_materia varchar(30)
}

Table Notas {
    ID             int [primary key]
    id_estu        int
    id_materia     int
    Nota           decimal(5,2)
    fecha_registro date
}

Table Alumnos_Materias {
    id_alumno  int 
    id_materia int 
    primary key (id_alumno, id_materia)
}

Ref: Notas.id_estu > Alumnos.ID
Ref: Notas.id_materia > Materias.ID
Ref: Alumnos_Materias.id_alumno > Alumnos.ID
Ref: Alumnos_Materias.id_materia > Materias.ID
