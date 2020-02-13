CREATE DATABASE centro_agricola;

CREATE TABLE usuarios(
id              int(255) auto_increment not null,
nombre          varchar(100) not null,
apelidos        varchar(255),
email           varchar(100) not null,
password        varchar(255) not null,
rol             varchar(20),
CONSTRAINT pk_usuarios PRIMARY KEY(id),
CONSTRAINT uq_email UNIQUE(email)
)ENGINE=InnoDb;


CREATE TABLE categorias_productos(
id          int(255) auto_increment not null,
nombre      varchar(100) not null,
CONSTRAINT pk_categorias_productos PRIMARY KEY(id)
)ENGINE=InnoDb;


CREATE TABLE productos(
id              int(255) auto_increment not null,
categoria_id    int(255) not null, 
nombre          varchar(100) not null,
descripcion     text,
precio          float(100,2) not null,
cantidad        int(255) not null,
fecha           date not null,
imagen          varchar(255),
CONSTRAINT pk_productos PRIMARY KEY(id),
CONSTRAINT fk_producto_categoria FOREIGN KEY(categoria_id) REFERENCES categorias_productos(id)

)ENGINE=InnoDb;

CREATE TABLE categorias_publicaciones(
id          int(255) auto_increment not null,
nombre      varchar(100) not null,
CONSTRAINT pk_categorias_productos PRIMARY KEY(id)
)ENGINE=InnoDb;



CREATE TABLE publicaciones(
id              int(255) auto_increment not null,
categoria_id int(255) not null,
nombre        varchar(100) not null;
descripcion   text,
fecha         date not null;
imagen        varchar(255);

CONSTRAINT pk_publicaciones PRIMARY KEY(id),
CONSTRAINT fk_publicacion_categoria FOREIGN KEY(categoria_id) REFERENCES categorias_publicaciones(id)



)ENGINE=InnoDb;


