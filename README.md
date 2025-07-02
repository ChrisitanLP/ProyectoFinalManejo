# 🎓 Sistema de Gestión de Aprendizaje (LMS)

[![PHP](https://img.shields.io/badge/PHP-7.4%2B-8892BF.svg)](https://www.php.net)
[![MySQL](https://img.shields.io/badge/MySQL-5.7%2B-4479A1.svg)](https://www.mysql.com)
[![HTML](https://img.shields.io/badge/HTML5-Structured-orange.svg)](https://developer.mozilla.org/en-US/docs/Web/Guide/HTML/HTML5)
[![CSS](https://img.shields.io/badge/CSS3-Styled-264de4.svg)](https://developer.mozilla.org/en-US/docs/Web/CSS)
[![JavaScript](https://img.shields.io/badge/JavaScript-ES6%2B-F7DF1E.svg?logo=javascript&logoColor=black)](https://developer.mozilla.org/en-US/docs/Web/JavaScript)
[![Bootstrap](https://img.shields.io/badge/Bootstrap-5.x-7952B3.svg?logo=bootstrap&logoColor=white)](https://getbootstrap.com/)
[![jQuery](https://img.shields.io/badge/jQuery-3.x-0769AD.svg?logo=jquery&logoColor=white)](https://jquery.com/)
[![Font Awesome](https://img.shields.io/badge/Font%20Awesome-6.x-339AF0.svg?logo=fontawesome&logoColor=white)](https://fontawesome.com/)
[![DataTables](https://img.shields.io/badge/DataTables-Plugin-1E90FF.svg?logo=datatables&logoColor=white)](https://datatables.net/)
[![Chart.js](https://img.shields.io/badge/Chart.js-4.x-F5788D.svg?logo=chartdotjs&logoColor=white)](https://www.chartjs.org/)

**Sistema de Gestión de Aprendizaje (LMS)** es una plataforma orientada a facilitar el proceso de enseñanza y aprendizaje dentro de la comunidad educativa. Su objetivo principal es brindar un espacio digital accesible y organizado donde docentes puedan gestionar sus cursos, compartir contenidos, evaluar el progreso de sus estudiantes, así mismo los estudiantes podrán inscribirse a sus cursos deseados, podrán editar su propia información y subir sus tareas, además contará con un administrador que tenga acceso editar la plataforma..

---

## 📋 Tabla de Contenidos

- [🎓 Sistema de Gestión de Aprendizaje (LMS)](#-sistema-de-gestión-de-aprendizaje-lms)
  - [📋 Tabla de Contenidos](#-tabla-de-contenidos)
  - [📌 Características principales](#-características-principales)
  - [🛠️ Requisitos previos](#️-requisitos-previos)
  - [📦 Instalación](#-instalación)
    - [1. Clonar el repositorio](#1-clonar-el-repositorio)
    - [2. Configurar la base de datos](#2-configurar-la-base-de-datos)
    - [3. Configurar archivos de entorno](#3-configurar-archivos-de-entorno)
  - [📁 Estructura del proyecto](#-estructura-del-proyecto)
    - [📂 Descripción detallada de módulos](#-descripción-detallada-de-módulos)
  - [⚙️ Configuración](#️-configuración)
    - [Configuración de base de datos](#configuración-de-base-de-datos)
  - [📌 API — Gestión de Entidades](#-api--gestión-de-entidades-en-la-plataforma-lms)
    - [👨‍🏫 Registro de Docentes](#-registro-de-docentes)
    - [👥 Registro de Usuarios](#-registro-de-usuarios)
    - [👨‍🎓 Registro de Estudiantes](#-registro-de-estudiantes)
    - [🏫 Gestión de Cursos](#-gestión-de-cursos)
    - [📚 Gestión de Asignaturas](#-gestión-de-asignaturas)
    - [📥 Asignación de Deberes](#-asignación-de-deberes)
    - [📄 Entrega de Deberes](#-entrega-de-deberes)
    - [🧮 Calificación de Deberes](#-calificación-de-deberes)
    - [📋 Endpoints AJAX por tipo](#-endpoints-ajax-por-tipo)
    - [🔐 Login y Autenticación](#-login-y-autenticación)
  - [🔧 Arquitectura del sistema](#-arquitectura-del-sistema)
    - [Patrones de diseño implementados](#patrones-de-diseño-implementados)
  - [🐞 Solución de problemas](#-solución-de-problemas)
    - [❌ Error de conexión a base de datos](#❌-error-de-conexión-a-base-de-datos)
    - [❌ Error 409 en operaciones de usuarios](#❌-error-409-en-operaciones-de-usuarios)
    - [❌ Operación no válida](#❌-operación-no-válida)
  - [📄 Respuestas de API](#-respuestas-de-api)
    - [Formato de respuesta exitosa](#formato-de-respuesta-exitosa)
    - [Formato de respuesta de error](#formato-de-respuesta-de-error)
    - [Códigos de estado HTTP](#códigos-de-estado-http)
  - [⚠️ Limitaciones](#️-limitaciones)
  - [📄 Licencia](#-licencia)

---

## 📌 Características principales

- ✅ **Gestión de cursos**: Creación, edición y listado de cursos
- ✅ **Gestión de asignaturas**: Creación, edición y listado de asignaturas
- ✅ **Gestión de asignaciones**: Creación, edición y listado de asignaciones con capacidad de subir archivos y admitir entregables
- 👥 **Roles personalizados**: Perfiles de usuario para visitantes, estudiantes, docentes y administradores con permisos específicos 
- 📈 **Seguimiento del aprendizaje**: Reportes visuales del progreso académico por usuario
- 📂 **Gestión de archivos**: Subida, visualización y descarga segura de documentos y tareas 
- 🧮 **Gestión de notas**: Registro, visualización y edición de calificaciones por parte del docente.  
- 🧑 **Configuración de perfil**: Personalización del perfil de usuario con datos personales, foto, contraseña y correo.
- 🔐 **Autenticación segura**: Inicio de sesión protegido con manejo de sesiones y control de accesos por rol  
- 📱 **Diseño responsivo**: Interfaz adaptable para computadoras, tablets y dispositivos móviles
- 🛡️ **Seguridad avanzada**: Sanitización de entrada y protección contra inyección de headers
---

## 🛠️ Requisitos previos

- **PHP** >= 5.5.0
- **Extensiones PHP requeridas:**
  - Ninguna 
- **Extensiones PHP opcionales:**
  - Ninguna
- **Base de datos** compatible con PDO
- **Servidor web** (Apache/Nginx)

---

## 📦 Instalación

### 1. Clonar el repositorio
```bash
git clone <repository-url>
cd ProyectoFinalManejo
```

### 2. Configurar la base de datos
```sql
CREATE DATABASE manejo;
```

### 3. Configurar archivos de entorno
Crear archivo de configuración de base de datos y SMTP según tu entorno.

---

## 📁 Estructura del proyecto

```
ProyectoFinalManejo/
├── BD/                              # Almacenamiento de archivos y base de datos
│   ├── archivos/                    # Se almacenan los archivos cargados en la plataforma
│   └── BaseDatos.txt                # SQL de la base de datos 
├── Conexion/                        # Archivos que involucren conexión 
│   ├── ajax.php                     # Peticiones ajax
│   ├── conectar.php                 # Archivo de conexión a la base de datos
|   ├── insertar.php                 # Lógica para toda acción de insertar
│   ├── listar.php                   # Lógica para toda acción de listar
|   ├── modificarA.php               # Lógica para modificar asignaturas
│   ├── modificarC.php               # Lógica para modificar cursos
|   ├── modificarD.php               # Lógica para modificar docentes
│   ├── modificarE.php               # Lógica para modificar estudiantes
|   ├── modificarU.php               # Lógica para modificar usuarios
│   └── validar.php                  # Validación del usario 
├── CSS/                             # Archivos de estilo
├── fonts/                           # Fuentes tipográficas
├── img/                             # Recursos gráficos
│   └── Logos/                       # Imágenes de logotipos usados
├── JS/                              # Scripts JavaScript
├── Paginas/                         # Páginas de la aplicación
│   ├── Admin/                       # Páginas pertenecientes al administrador
│   ├── Docentes/                    # Páginas pertenecientes al docente
│   └── Estudiantes/                 # Páginas pertenecientes al estudiante
├── scss/                            # Archivos SCSS
│   ├── navs/                        # Estilos de barra de navegación
│   └── utilities/                   # Configuraciones para los estilos básicos 
├── vendor/                          # Librerias
│   ├── bootstrap/                   # Librería CSS para diseño responsivo y componentes UI
│   ├── chart.js/                    # Librería para gráficos y visualización de datos
│   ├── datatables/                  # Plugin jQuery para tablas interactivas
│   ├── fontawesome-free/            # Librería para íconos vectoriales y fuentes personalizadas
│   ├── jquery/                      # Librería JavaScript para manipulación del DOM
│   └── jquery-easing/               # Plugin para animaciones con efectos de suavizado
├── cerrar.php                       # Lógica para cerrar la sesión
├── index.php                        # Página de inicio
├── login.php                        # Página de inicio de sesión
└── README.md                        # Este archivo
```

### 📂 Descripción detallada de módulos

| 📁 Carpeta / Archivo               | 📌 Descripción                                                                                      |
|-----------------------------------|------------------------------------------------------------------------------------------------------|
| `BD/`                             | Contiene el archivo SQL de la base de datos y los archivos cargados por los usuarios.              |
| ├── `archivos/`                   | Carpeta para almacenar archivos subidos en la plataforma.                                           |
| └── `BaseDatos.txt`              | Script SQL de estructura y datos de la base de datos.                                               |
| `Conexion/`                       | Lógica de conexión y operaciones principales sobre la base de datos.                               |
| ├── `ajax.php`                   | Gestión de peticiones AJAX para respuestas dinámicas.                                               |
| ├── `conectar.php`               | Archivo principal de conexión a la base de datos.                                                   |
| ├── `insertar.php`               | Inserción de registros en las distintas tablas.                                                     |
| ├── `listar.php`                 | Listado general de registros desde la base de datos.                                                |
| ├── `modificarA.php`             | Modificación de datos relacionados con asignaturas.                                                 |
| ├── `modificarC.php`             | Modificación de datos relacionados con cursos.                                                      |
| ├── `modificarD.php`             | Modificación de datos relacionados con docentes.                                                    |
| ├── `modificarE.php`             | Modificación de datos relacionados con estudiantes.                                                 |
| ├── `modificarU.php`             | Modificación de datos relacionados con usuarios.                                                    |
| └── `validar.php`                | Validación de credenciales de usuario para el inicio de sesión y verificar si hay una sesión activa.                                     |
| `CSS/`                            | Hojas de estilo CSS utilizadas en la aplicación.                                                    |
| `fonts/`                          | Fuentes tipográficas empleadas en la interfaz.                                                      |
| `img/`                            | Imágenes y recursos gráficos del sistema.                                                           |
| └── `Logos/`                      | Carpeta específica para logotipos institucionales o del sistema.                                    |
| `JS/`                             | Scripts JavaScript que gestionan dinámicas del frontend.                                            |
| `Paginas/`                        | Contiene las páginas organizadas por roles.                                                          |
| ├── `Admin/`                      | Páginas exclusivas para el rol de administrador.                                                    |
| ├── `Docentes/`                   | Páginas destinadas a la gestión por parte del docente.                                              |
| └── `Estudiantes/`                | Páginas disponibles para los estudiantes.                                                           |
| `scss/`                           | Código fuente en SCSS para la personalización de estilos.                                           |
| ├── `navs/`                       | Estilos específicos para la barra de navegación.                                                    |
| └── `utilities/`                  | Variables, mixins y configuraciones reutilizables en SCSS.                                          |
| `vendor/`                         | Librerías y plugins externos utilizados en el sistema.                                              |
| ├── `bootstrap/`                 | Framework CSS para diseño responsivo y componentes visuales.                                        |
| ├── `chart.js/`                  | Librería JavaScript para generación de gráficos.                                                    |
| ├── `datatables/`                | Plugin jQuery para tablas interactivas y búsqueda.                                                  |
| ├── `fontawesome-free/`          | Librería de íconos vectoriales y tipográficos.                                                      |
| ├── `jquery/`                    | Biblioteca base JavaScript para manipulación del DOM.                                               |
| └── `jquery-easing/`             | Plugin de animaciones con efectos de transición suaves.                                             |
| `cerrar.php`                      | Archivo que gestiona el cierre seguro de sesión.                                                    |
| `index.php`                       | Página principal del sistema o dashboard inicial tras el login.                                     |
| `login.php`                       | Página de acceso para autenticación de usuarios.                                                    |
| `README.md`                       | Archivo de documentación principal del proyecto.                                                    |

---

## ⚙️ Configuración

### Configuración de base de datos
Crear las siguientes tablas en tu base de datos:

```sql
-- Tabla para el login
CREATE TABLE `login` (
  `id` INT PRIMARY KEY AUTO_INCREMENT,	
  `USU_LOG` varchar(50) NOT NULL,
  `PAS_LOG` varchar(50) NOT NULL,
  `ROL_LOG` varchar(20) NOT NULL,
  `NOM_USU_LOG` varchar(50)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Datos de la tabla login
INSERT INTO `login` (`id`, `USU_LOG`, `PAS_LOG`, `ROL_LOG`) VALUES
(1, 'Admin', 'admin', 'Administrador'),
(2, 'Christian', '2512CL', 'Docente'),
(3, 'Mateo', '15diciembre001', 'Estudiante'),
(4, 'User', 'wolfly2001', 'Invitado');

-- Tabla de docentes
CREATE TABLE `docentes` (
  `id` INT PRIMARY KEY AUTO_INCREMENT,	
  `CED_DOC` VARCHAR(10) UNIQUE NOT NULL,
  `NOM_DOC` VARCHAR(25) NOT NULL,
  `APE_DOC` VARCHAR(25) NOT NULL,
  `DIR_DOC` VARCHAR(50) NOT NULL,
  `COR_INS_DOC` VARCHAR(50) UNIQUE NOT NULL,
  `TEL_DOC` VARCHAR(10) NOT NULL,
  `FEC_NAC_DOC` DATE NOT NULL,
  `NOM_ARCH` VARCHAR(600),	
  `RUT_ARCH` VARCHAR(600),	
  `TIP_ARCH` VARCHAR(600),
  `TAM_ARCH` VARCHAR(50)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Tabla de estudiantes
CREATE TABLE `estudiantes` (
  `id` INT PRIMARY KEY AUTO_INCREMENT,		
  `CED_EST` VARCHAR(10) UNIQUE NOT NULL,
  `NOM_EST` VARCHAR(25) NOT NULL,
  `APE_EST` VARCHAR(25) NOT NULL,
  `DIR_EST` VARCHAR(50) NOT NULL,
  `COR_INS_EST` VARCHAR(50) UNIQUE NOT NULL,
  `CEL_EST` VARCHAR(10) NOT NULL,
  `TEL_EST` VARCHAR(10) NOT NULL,
  `FEC_NAC_EST` DATE NOT NULL,
  `NOM_ARCH` VARCHAR(600),	
  `RUT_ARCH` VARCHAR(600),	
  `TIP_ARCH` VARCHAR(600),
  `TAM_ARCH` VARCHAR(50)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Tabla de usuarios
CREATE TABLE `usuarios` (
  `id` INT PRIMARY KEY AUTO_INCREMENT,	
  `CED_USU` VARCHAR(10) UNIQUE NOT NULL,
  `NOM_USU` VARCHAR(25) NOT NULL,
  `APE_USU` VARCHAR(25) NOT NULL,
  `DIR_USU` VARCHAR(50) NOT NULL,
  `COR_INS_USU` VARCHAR(50) UNIQUE NOT NULL,
  `TEL_USU` VARCHAR(10) NOT NULL,
  `FEC_NAC_USU` DATE NOT NULL,
  `NOM_ARCH` VARCHAR(600),	
  `RUT_ARCH` VARCHAR(600),	
  `TIP_ARCH` VARCHAR(600),
  `TAM_ARCH` VARCHAR(50)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Tabla de cursos
CREATE TABLE `cursos` (
  `id` INT PRIMARY KEY AUTO_INCREMENT,	
  `COD_CUR` VARCHAR(10) UNIQUE NOT NULL,
  `NOM_CUR` VARCHAR(50) NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Tabla de asignaturas
CREATE TABLE `asignaturas` (
  `id` INT PRIMARY KEY AUTO_INCREMENT,		
  `COD_ASI` VARCHAR(10) UNIQUE NOT NULL,
  `NOM_ASI` VARCHAR(50) NOT NULL,
  `HOR_ASI` VARCHAR(25) NOT NULL,
  `CUR_ASI` INT NOT NULL REFERENCES cursos(id),
  `DOC_ASI` INT NOT NULL REFERENCES docentes(id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Tabla de asignación de deberes
CREATE TABLE `asignacion_deberes` (
  `id` INT PRIMARY KEY AUTO_INCREMENT,	
  `COD_ASI` INT NOT NULL REFERENCES asignaturas(id),
  `COD_DOC` INT NOT NULL REFERENCES docentes(id),
  `NOM_ASIG` VARCHAR(60) NOT NULL,	
  `DES_ASIG` VARCHAR(600) NOT NULL,
  `FEC_ASIG` DATE NOT NULL,
  `NOM_ARCH` VARCHAR(600),	
  `RUT_ARCH` VARCHAR(600),	
  `TIP_ARCH` VARCHAR(600),
  `TAM_ARCH` VARCHAR(50),
  `EST_ASIG` VARCHAR(1)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Tabla de detalles de la asignación
CREATE TABLE `detalle_asignacion` (
  `id` INT PRIMARY KEY AUTO_INCREMENT,		
  `COD_ASIG_DEB` INT NOT NULL REFERENCES asignacion_deberes(id),
  `ID_EST_ASIG` INT NOT NULL REFERENCES estudiantes(id),
  `DES_ASIG_DEB` VARCHAR(600),	
  `NOM_ARCH` VARCHAR(600),	
  `RUT_ARCH` VARCHAR(600),	
  `TIP_ARCH` VARCHAR(600),
  `TAM_ARCH` VARCHAR(50),
  `NOT_ASIG` INT
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Tabla de detalles de los estudiantes
CREATE TABLE `detalle_estudiantes` (
  `id` INT PRIMARY KEY AUTO_INCREMENT,		
  `ID_ASI` INT NOT NULL REFERENCES asignaturas(id),
  `ID_EST` INT NOT NULL REFERENCES estudiantes(id)
);

-- Tabla de detalles de docentes
CREATE TABLE `detalle_docentes` (
  `id` INT PRIMARY KEY AUTO_INCREMENT,		
  `ID_ASI` VARCHAR(10) NOT NULL REFERENCES asignaturas(id),
  `ID_DOC` VARCHAR(25) NOT NULL REFERENCES docentes(id)
);

```
---

## 📌 API — Gestión de Entidades en la Plataforma LMS

Este sistema utiliza endpoints internos implementados con PHP y consultas SQL mediante PDO para gestionar datos de docentes, estudiantes, usuarios, cursos, asignaturas, deberes y entregas. A continuación se detallan las operaciones CRUD disponibles, los archivos involucrados y los campos requeridos.

---

### 👨‍🏫 Registro de Docentes

| Endpoint                         | Método | Acción     | Descripción                                                                 |
|----------------------------------|--------|------------|-----------------------------------------------------------------------------|
| `Conexion/insertar.php`     | POST   | `enviarD`  | Inserta un nuevo docente, guarda su archivo de perfil y lo registra en `login`. |

**Campos esperados:**  
`CED_DOC`, `NOM_DOC`, `APE_DOC`, `DIR_DOC`, `COR_INS_DOC`, `TEL_DOC`, `fechaD`, `FEC_NAC_DOC`

---

### 👥 Registro de Usuarios

| Endpoint                         | Método | Acción     | Descripción                                                                 |
|----------------------------------|--------|------------|-----------------------------------------------------------------------------|
| `Conexion/insertar.php`     | POST   | `enviarU`  | Inserta un nuevo usuario con sus datos personales y archivo de perfil.     |

**Campos esperados:**  
`CED_USU`, `NOM_USU`, `APE_USU`, `DIR_USU`, `COR_INS_USU`, `TEL_USU`, `FEC_NAC_USU`

---

### 👨‍🎓 Registro de Estudiantes

| Endpoint                          | Método | Acción     | Descripción                                                                 |
|-----------------------------------|--------|------------|-----------------------------------------------------------------------------|
| `Conexion/insertar.php`   | POST   | `enviarE`  | Inserta un nuevo estudiante y guarda su archivo de perfil.                 |

**Campos esperados:**  
`CED_EST`, `NOM_EST`, `APE_EST`, `DIR_EST`, `COR_INS_EST`, `CEL_EST`, `TEL_EST`, `FEC_NAC_EST`

---

### 🏫 Gestión de Cursos

| Endpoint                         | Método | Acción     | Descripción                                      |
|----------------------------------|--------|------------|--------------------------------------------------|
| `Conexion/insertar.php`       | POST   | `enviarC`  | Crea un nuevo curso con código y nombre.         |

**Campos esperados:**  
`COD_CUR`, `NOM_CUR`

---

### 📚 Gestión de Asignaturas

| Endpoint                          | Método | Acción       | Descripción                                                     |
|-----------------------------------|--------|--------------|-----------------------------------------------------------------|
| `Conexion/listar.php`   | POST   | `listar`     | Carga los datos de una asignatura por ID para editarlos.        |
| `Conexion/modificarA.php`   | POST   | `actualizar` | Actualiza los campos de la asignatura seleccionada.             |
| `Conexion/modificarA.php`   | POST   | `eliminar`   | Elimina una asignatura por ID.                                  |

**Campos esperados para actualización:**  
`id`,`COD_ASI`, `NOM_ASI`, `HOR_ASI`, `CUR_ASI`, `DOC_ASI`

(Aplica lo mismo para todas las tablas)

---

### 📥 Asignación de Deberes

| Endpoint                            | Método | Acción     | Descripción                                                    |
|-------------------------------------|--------|------------|----------------------------------------------------------------|
| `Conexion/insertar.php`   | POST   | `subir`    | Inserta una nueva asignación con nombre, descripción y archivo. |

**Campos esperados:**  
`COD_ASI`, `COD_DOC`, `NOM_ASIG`, `DES_ASIG`, `FEC_ASIG`, `NOM_ARCH`, `RUT_ARCH`, `TIP_ARCH`, `TAM_ARCH`, `EST_ASIG`

---

### 📄 Entrega de Deberes

| Endpoint                              | Método | Acción     | Descripción                                                   |
|---------------------------------------|--------|------------|---------------------------------------------------------------|
| `Conexion/insertar.php`     | POST   | `entregar` | El estudiante entrega su deber con archivo y descripción.     |

**Campos esperados:**  
`COD_ASIG_DEB`, `ID_EST_ASIG`, `DES_ASIG_DEB`, `NOM_ARCH`, `RUT_ARCH`, `TIP_ARCH`, `TAM_ARCH`

---

### 🧮 Calificación de Deberes

| Endpoint                             | Método | Acción     | Descripción                                         |
|--------------------------------------|--------|------------|-----------------------------------------------------|
| `Conexion/ajax.php?opcion=1`       | POST   | `guardar`  | Guarda la nota de una asignación entregada.         |

**Campos esperados:**  
`id`, `NOT_ASIG`  

---

### 📋 Endpoints AJAX por tipo

| Endpoint                                | Método | Descripción                                  |
|-----------------------------------------|--------|----------------------------------------------|
| `Conexion/ajax.php?action_type=docente`     | GET    | Lista todos los docentes registrados.        |
| `Conexion/ajax.php?action_type=asignatura`  | GET    | Lista las asignaturas existentes.            |
| `Conexion/ajax.php?action_type=estudiante`  | GET    | Lista todos los estudiantes.                 |
| `Conexion/ajax.php?action_type=curso`       | GET    | Lista los cursos disponibles.                |

---

### 🔐 Login y Autenticación

| Endpoint      | Método | Acción         | Descripción                                          |
|---------------|--------|----------------|------------------------------------------------------|
| `Conexion/validar.php`   | POST   | Inicio de sesión | Verifica credenciales en la tabla `login`.          |
| `cerrar.php`  | GET    | Cerrar sesión   | Finaliza la sesión del usuario.                      |

---

## 🔧 Arquitectura del sistema

### Patrones de diseño implementados

- No se implementaron patrones de diseño
---
## 🐞 Solución de problemas

### ❌ Error de conexión a base de datos
- Verifica las credenciales de conexión
- Confirma que el servidor de base de datos esté activo
- Revisa los permisos de usuario en la base de datos

### ❌ Error 409 en operaciones de usuarios
- La cédula ya existe en el sistema
- Utiliza valores únicos para estos campos

### ❌ Operación no válida
- Confirma que estés usando el método HTTP correcto

---

## 📄 Respuestas de API

### Formato de respuesta exitosa
```json
{
    "success": true,
    "data": [...],
    "message": "Respuesta personalizada"
}
```

### Formato de respuesta de error
```json
{
    "mensaje": "Descripción del error",
    "error": "Detalles técnicos del error"
}
```

### Códigos de estado HTTP

| Código | Significado | Contexto |
|--------|-------------|----------|
| **200** | Éxito | Operación completada correctamente |
| **409** | Conflicto | Datos duplicados (cédula) |
| **400** | Solicitud incorrecta | Parámetros faltantes o inválidos |

---

## ⚠️ Limitaciones

- **PHP mínimo**: Requiere PHP 5.5.0 o superior
- **Base de datos**: Compatible solo con sistemas PDO
- **Idioma**: Solo tiene disponible el idioma español
- **Sanitización**: No cuenta con sanitización en las consultas

---

## 📄 Licencia

El código base de Sistema de Gestión de Aprendizaje (LMS) está disponible para uso libre.

---

<div align="center">

**[⬆ Volver al inicio](#-sistema-de-gestión-de-aprendizaje-lms)**
</div>
