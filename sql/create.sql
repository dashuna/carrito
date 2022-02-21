USE tiendaOnline;

create table if not exists categorias
(
    id     int auto_increment
        primary key,
    nombre varchar(50) not null,
    constraint categorias_id_uindex
        unique (id),
    constraint categorias_nombre_uindex
        unique (nombre)
)
    engine = InnoDB;

create table if not exists facturas
(
    id                 int auto_increment
        primary key,
    nombre_facturacion varchar(50) not null,
    es_empresa         tinyint(1)  not null,
    num_documento      varchar(9)  not null,
    tarjeta            varchar(40) not null,
    constraint facturas_id_uindex
        unique (id)
)
    engine = InnoDB;

create table if not exists marcas
(
    id     int auto_increment
        primary key,
    nombre varchar(50) not null,
    constraint marcas_id_uindex
        unique (id),
    constraint marcas_nombre_uindex
        unique (nombre)
)
    engine = InnoDB;

create table if not exists productos
(
    id           int auto_increment
        primary key,
    id_marca     int           not null,
    id_categoria int           not null,
    nombre       varchar(200)  not null,
    descripcion  varchar(300)  not null,
    precio       decimal(5, 2) not null,
    stock        int           not null,
    imagen       varchar(100)  null,
    constraint productos_id_uindex
        unique (id),
    constraint productos_categorias_fk
        foreign key (id_categoria) references categorias (id),
    constraint productos_marcas_fk
        foreign key (id_marca) references marcas (id)
)
    engine = InnoDB;

create table if not exists roles
(
    id  int auto_increment
        primary key,
    rol varchar(20) not null,
    constraint roles_id_uindex
        unique (id),
    constraint roles_rol_uindex
        unique (rol)
)
    engine = InnoDB;

create table if not exists usuarios
(
    id        int auto_increment
        primary key,
    id_rol    int          not null,
    usuario   varchar(30)  not null,
    password  varchar(250) not null,
    nombre    varchar(30)  not null,
    apellidos varchar(70)  null,
    email     varchar(50)  not null,
    telefono  int          not null,
    constraint usuarios_usuario_uindex
        unique (usuario),
    constraint usuarios_rol__fk
        foreign key (id_rol) references roles (id)
)
    engine = InnoDB;

create table if not exists carrito
(
    id          int auto_increment
        primary key,
    id_usuario  int not null,
    id_producto int not null,
    cantidad    int not null,
    constraint carrito_id_uindex
        unique (id),
    constraint carrito_productos_fk
        foreign key (id_producto) references productos (id),
    constraint carrito_usuarios_fk
        foreign key (id_usuario) references usuarios (id)
)
    engine = InnoDB;

create table if not exists pedidos
(
    id         int auto_increment
        primary key,
    id_usuario int           not null,
    fecha      datetime      not null,
    total      decimal(8, 2) not null,
    id_factura int           not null,
    constraint pedido_id_uindex
        unique (id),
    constraint pedido_usuarios_fk
        foreign key (id_usuario) references usuarios (id)
)
    engine = InnoDB;

create table if not exists detalle_pedido
(
    id          int auto_increment
        primary key,
    id_pedido   int not null,
    id_producto int not null,
    unidades    int not null,
    constraint detalle_pedido_id_uindex
        unique (id),
    constraint detalle_pedido_pedidos_fk
        foreign key (id_pedido) references pedidos (id),
    constraint detalle_pedido_productos_fk
        foreign key (id_producto) references productos (id)
)
    engine = InnoDB;

