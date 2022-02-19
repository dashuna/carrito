<?php

class Usuario
{
    private int $id;
    private string $usuario;
    private string $nombre;
    private string $apellidos;
    private string $email;
    private int $telefono;
    private string $password;
    private int $id_rol;

    /**
     * @param int $id
     * @param string $usuario
     * @param string $nombre
     * @param string $apellidos
     * @param string $email
     * @param int $telefono
     * @param string $password
     * @param int $id_rol
     */
    public function __construct(int $id, string $usuario, string $nombre, string $apellidos, string $email, int $telefono, string $password, int $id_rol)
    {
        $this->id = $id;
        $this->usuario = $usuario;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->email = $email;
        $this->telefono = $telefono;
        $this->password = $password;
        $this->id_rol = $id_rol;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getUsuario(): string
    {
        return $this->usuario;
    }

    /**
     * @param string $usuario
     */
    public function setUsuario(string $usuario): void
    {
        $this->usuario = $usuario;
    }

    /**
     * @return string
     */
    public function getNombre(): string
    {
        return $this->nombre;
    }

    /**
     * @param string $nombre
     */
    public function setNombre(string $nombre): void
    {
        $this->nombre = $nombre;
    }

    /**
     * @return string
     */
    public function getApellidos(): string
    {
        return $this->apellidos;
    }

    /**
     * @param string $apellidos
     */
    public function setApellidos(string $apellidos): void
    {
        $this->apellidos = $apellidos;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return int
     */
    public function getTelefono(): int
    {
        return $this->telefono;
    }

    /**
     * @param int $telefono
     */
    public function setTelefono(int $telefono): void
    {
        $this->telefono = $telefono;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * @return int
     */
    public function getIdRol(): int
    {
        return $this->id_rol;
    }

    /**
     * @param int $id_rol
     */
    public function setIdRol(int $id_rol): void
    {
        $this->id_rol = $id_rol;
    }


}