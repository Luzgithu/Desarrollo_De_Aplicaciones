# Laboratorio N.° 01 — HTML5

> **Curso:** Desarrollo de Aplicaciones  
> **Escuela Profesional:** Ingeniería de Sistemas  
> **Universidad:** Universidad Católica de Santa María  
> **Laboratorio:** N.° 01  
> **Tema:** HTML5  
> **Año:** 2026

---

## 📌 Descripción

Este laboratorio tiene como objetivo aplicar los fundamentos de **HTML5** mediante el desarrollo de diferentes experiencias y ejercicios prácticos.

A lo largo del laboratorio se trabaja desde la estructura básica de un documento HTML hasta componentes más específicos como formularios, validaciones, tablas, metadatos y publicación de páginas mediante GitHub Pages.

El desarrollo permite comprender cómo HTML organiza el contenido que interpreta un navegador y cómo sus elementos y atributos pueden utilizarse para construir páginas más estructuradas, accesibles y preparadas para ser publicadas en la web.

---

## 🎯 Objetivos

Los principales objetivos desarrollados durante el laboratorio son:

- Comprender la estructura básica de un documento HTML5.
- Utilizar correctamente elementos, etiquetas y atributos HTML.
- Aplicar etiquetas semánticas para organizar el contenido.
- Implementar formularios para recopilar información del usuario.
- Utilizar diferentes tipos de `input` y validaciones nativas de HTML5.
- Comprender el funcionamiento de los métodos HTTP utilizados por los formularios.
- Representar información mediante tablas HTML.
- Utilizar `<colgroup>` y `<col>` para trabajar con columnas.
- Implementar metadata dentro del `<head>`.
- Aplicar conceptos básicos de SEO.
- Implementar Open Graph y Twitter Cards.
- Utilizar Git y GitHub para mantener el control de versiones.
- Publicar contenido web estático mediante GitHub Pages.

---

# 🧠 Conceptos principales

## 1. HTML5

HTML (*HyperText Markup Language*) es un lenguaje de marcado utilizado para definir la estructura y el contenido de una página web.

Un documento HTML5 parte normalmente de una estructura similar a la siguiente:

```html
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Laboratorio HTML5</title>
</head>

<body>

    <header>
        <h1>Desarrollo de Aplicaciones</h1>
    </header>

    <main>
        <section>
            <h2>HTML5</h2>
            <p>Contenido principal de la página.</p>
        </section>
    </main>

    <footer>
        <p>Laboratorio N.° 01</p>
    </footer>

</body>

</html>
```

La sección `<head>` almacena información relacionada con el documento, mientras que `<body>` contiene los elementos visibles para el usuario.

---

## 2. Elementos y atributos

Los elementos HTML permiten indicar el significado o función de cada parte del documento.

Por ejemplo:

```html
<p>
    Visita
    <a
        href="https://www.hackthebox.com/"
        title="Hack The Box"
        target="_blank"
    >
        Hack The Box
    </a>
</p>
```

En este caso, `<a>` representa un hipervínculo y utiliza diferentes atributos:

- `href`: dirección a la que apunta el enlace.
- `title`: información adicional sobre el recurso.
- `target="_blank"`: abre el enlace en una nueva pestaña.

Los atributos permiten complementar y modificar el comportamiento de los elementos HTML.

---

## 3. HTML semántico

HTML5 incluye elementos semánticos que describen el propósito del contenido que contienen.

Algunos de los más utilizados son:

```html
<header></header>
<nav></nav>
<main></main>
<section></section>
<article></article>
<aside></aside>
<footer></footer>
```

A diferencia de elementos genéricos como `<div>` o `<span>`, estas etiquetas permiten representar de manera más clara la estructura lógica de una página.

Una estructura semántica facilita el mantenimiento del código y también aporta información útil para navegadores, motores de búsqueda y tecnologías de asistencia.

---

# 🧪 Experiencias de práctica

## Experiencia 1 — Elementos y atributos HTML

En la primera experiencia se trabajó con elementos básicos de HTML y sus atributos.

Se utilizó la etiqueta `<em>` para representar texto con énfasis y posteriormente se creó un hipervínculo con el elemento `<a>`.

Ejemplo:

```html
<p>
    <em>
        Una plataforma en línea de entrenamiento y pruebas de seguridad es
        <a
            href="https://www.hackthebox.com/"
            title="Vínculo a la página de Hack The Box"
            target="_blank"
        >
            Hack The Box
        </a>.
    </em>
</p>
```

Esta experiencia permitió comprobar cómo los atributos agregan información y comportamiento a los elementos HTML.

---

## Experiencia 2 — Formulario web

En esta experiencia se implementó un formulario de contacto utilizando:

```html
<form>
<label>
<input>
<textarea>
<button>
```

El formulario recopila:

- Nombre.
- Correo electrónico.
- Mensaje.

Una versión simplificada es:

```html
<form action="guardar.php" method="post">

    <label for="name">Nombre:</label>
    <input
        type="text"
        id="name"
        name="user_name"
        required
    >

    <label for="mail">Correo:</label>
    <input
        type="email"
        id="mail"
        name="user_email"
        required
    >

    <label for="msg">Mensaje:</label>
    <textarea
        id="msg"
        name="user_message"
        required
    ></textarea>

    <button type="submit">
        Enviar mensaje
    </button>

</form>
```

Cada control utiliza el atributo `name`, ya que este permite identificar los datos durante el envío del formulario.

El flujo implementado es:

```text
index.html
    │
    │ POST
    ▼
guardar.php
    │
    ▼
mensajes.txt
```

### Procesamiento con PHP

Como complemento de la experiencia se utilizó PHP para recibir y almacenar los datos enviados.

Una parte representativa del procesamiento es:

```php
<?php

$nombre = trim($_POST["user_name"] ?? "");
$correo = trim($_POST["user_email"] ?? "");
$mensaje = trim($_POST["user_message"] ?? "");

$datos  = "Nombre: " . $nombre . "\n";
$datos .= "Correo: " . $correo . "\n";
$datos .= "Mensaje: " . $mensaje . "\n";
$datos .= "-------------------------\n";

file_put_contents(
    "mensajes.txt",
    $datos,
    FILE_APPEND | LOCK_EX
);

?>
```

Esto permitió observar la diferencia entre el código ejecutado directamente por el navegador y el procesamiento que necesita realizarse en un servidor.

### GitHub Pages y PHP

Durante las pruebas se encontró una diferencia importante:

**GitHub Pages permite publicar contenido estático, pero no ejecuta PHP.**

Por esta razón, las páginas HTML pueden visualizarse desde GitHub Pages, mientras que `guardar.php` debe probarse utilizando un servidor que tenga soporte para PHP.

Para realizar la prueba local se puede utilizar:

```bash
cd Experiencias_de_Trabajo/Experiencia2

python -m http.server 80
```

Luego se accede desde el navegador a:

```text
http://localhost:8000
```

> GitHub Pages se utiliza en este laboratorio para publicar el contenido estático. El procesamiento PHP corresponde a una prueba local adicional.

---

## Experiencia 3 — Tablas HTML

Las tablas permiten representar información que posee una relación entre filas y columnas.

Los principales elementos utilizados fueron:

```html
<table>
<tr>
<th>
<td>
<colgroup>
<col>
```

Ejemplo:

```html
<table>

    <tr>
        <th>Dato 1</th>
        <th>Dato 2</th>
    </tr>

    <tr>
        <td>Calcuta</td>
        <td>Pizza</td>
    </tr>

    <tr>
        <td>Robots</td>
        <td>Jazz</td>
    </tr>

</table>
```

Posteriormente se utilizó `<colgroup>` para aplicar propiedades sobre columnas completas:

```html
<table>

    <colgroup>
        <col>
        <col style="background-color: yellow;">
    </colgroup>

    <!-- filas de la tabla -->

</table>
```

Como actividad final se desarrolló un horario utilizando diferentes propiedades sobre las columnas:

```html
<colgroup>
    <col>
    <col>
    <col style="background-color: #97DB9A;">
    <col style="width: 42px;">
    <col style="background-color: #97DB9A;">
    <col
        style="
            background-color: #DCC48E;
            border: 4px solid #C1437A;
        "
    >
    <col style="width: 42px;">
    <col style="width: 42px;">
</colgroup>
```

Con esta experiencia se comprobó que la estructura de la tabla puede definirse independientemente de la presentación visual de sus columnas.

---

## Experiencia 4 — Metadata

La cuarta experiencia estuvo orientada a la información incluida dentro del `<head>` de un documento HTML.

Se trabajó con:

- Codificación UTF-8.
- `<title>`.
- Descripción de la página.
- Viewport.
- Open Graph.
- Twitter Cards.

Ejemplo general:

```html
<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Experiencia de Metadata HTML5</title>

    <meta
        name="description"
        content="Página desarrollada para la experiencia de práctica sobre metadata en HTML5."
    >

    <!-- Open Graph -->

    <meta
        property="og:title"
        content="Experiencia de Metadata HTML5"
    >

    <meta
        property="og:type"
        content="website"
    >

    <meta
        property="og:image"
        content="https://example.com/imagen.jpg"
    >

    <meta
        property="og:url"
        content="https://example.com/"
    >

    <!-- Twitter Card -->

    <meta
        name="twitter:card"
        content="summary_large_image"
    >

</head>
```

Los metadatos no forman parte del contenido principal visible de la página, pero entregan información adicional a navegadores, buscadores y otros servicios.

---

# 🔍 SEO y metadata

El SEO (*Search Engine Optimization*) reúne diferentes prácticas destinadas a mejorar la forma en que una página puede ser comprendida e indexada por motores de búsqueda.

Desde HTML se pueden aplicar aspectos como:

```html
<title>Laboratorio de HTML5</title>

<meta
    name="description"
    content="Práctica de Desarrollo de Aplicaciones sobre HTML5."
>
```

Además, una estructura semántica adecuada contribuye a identificar correctamente las diferentes partes del documento.

---

## Open Graph

Open Graph permite describir una página mediante metadatos.

Entre sus propiedades principales se encuentran:

```html
<meta property="og:title" content="Título">
<meta property="og:type" content="website">
<meta property="og:image" content="https://example.com/image.jpg">
<meta property="og:url" content="https://example.com/">
```

Estas propiedades pueden ser utilizadas por servicios compatibles para construir una representación del enlace.

---

## Twitter Cards

Twitter Cards utiliza metadatos similares orientados a la representación de enlaces en Twitter/X.

Por ejemplo:

```html
<meta
    name="twitter:card"
    content="summary_large_image"
>

<meta
    name="twitter:title"
    content="Laboratorio HTML5"
>

<meta
    name="twitter:description"
    content="Práctica de Desarrollo de Aplicaciones."
>
```

---

# ✅ Validación de formularios

HTML5 permite realizar validaciones básicas directamente desde el navegador.

Algunos de los atributos trabajados son:

| Atributo | Función |
|---|---|
| `required` | Hace obligatorio un campo |
| `minlength` | Longitud mínima |
| `maxlength` | Longitud máxima |
| `min` | Valor numérico mínimo |
| `max` | Valor numérico máximo |
| `pattern` | Define un patrón mediante una expresión regular |
| `type="email"` | Valida estructura básica de correo |
| `type="number"` | Permite valores numéricos |

Ejemplo:

```html
<input
    type="text"
    name="usuario"
    required
    minlength="4"
    maxlength="20"
    pattern="[A-Za-z0-9_]+"
>
```

El navegador verifica estas restricciones antes de permitir el envío normal del formulario.

---

# 🧩 Ejercicios propuestos

## Ejercicio 1 — Portafolio personal

El primer ejercicio consiste en desarrollar un portafolio utilizando una estructura semántica HTML5.

Una organización general puede ser:

```html
<body>

    <header>
        <h1>Mi Portafolio</h1>
    </header>

    <nav>
        <a href="#habilidades">Habilidades</a>
        <a href="#experiencia">Experiencia</a>
        <a href="#proyectos">Proyectos</a>
    </nav>

    <main>

        <section id="habilidades">
            <h2>Habilidades</h2>
        </section>

        <section id="proyectos">
            <h2>Proyectos</h2>

            <article>
                <h3>Proyecto 1</h3>
                <p>Descripción del proyecto.</p>
            </article>

        </section>

    </main>

    <footer>
        <p>Portafolio personal</p>
    </footer>

</body>
```

El objetivo principal es aplicar etiquetas semánticas, accesibilidad, estilos CSS y conceptos básicos de SEO.

---

## Ejercicio 2 — Formulario de registro con validación

En este ejercicio se desarrolló un formulario con diferentes tipos de entrada:

```text
text
email
password
number
tel
date
```

También se implementaron restricciones utilizando:

```text
required
pattern
minlength
maxlength
min
max
```

Ejemplo de validación de contraseña:

```html
<input
    type="password"
    name="password"
    required
    minlength="8"
    maxlength="30"
    pattern="(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9]).{8,30}"
>
```

El patrón exige una contraseña de entre 8 y 30 caracteres que incluya al menos una mayúscula, una minúscula y un número.

Ejemplo para teléfono:

```html
<input
    type="tel"
    name="telefono"
    required
    pattern="[0-9]{9}"
>
```

De esta manera se aplican validaciones nativas del lado del cliente sin depender inicialmente de JavaScript.

---

## Ejercicio 3 — Página de producto con metadata enriquecida

El tercer ejercicio integra varios conceptos del laboratorio dentro de una misma página.

La página debe contener:

- Información de un producto o servicio.
- Imagen.
- Descripción.
- Especificaciones técnicas.
- Tabla de características.
- Metadata.
- Open Graph.
- Twitter Cards.

Ejemplo de tabla:

```html
<table>
    <tr>
        <th>Característica</th>
        <th>Especificación</th>
    </tr>

    <tr>
        <td>Modelo</td>
        <td>Producto X</td>
    </tr>

    <tr>
        <td>Disponibilidad</td>
        <td>Disponible</td>
    </tr>
</table>
```

Junto con metadata enriquecida:

```html
<meta
    property="og:title"
    content="Producto X"
>

<meta
    property="og:description"
    content="Descripción del producto."
>

<meta
    property="og:image"
    content="https://example.com/producto.jpg"
>

<meta
    property="og:url"
    content="https://example.com/producto/"
>
```

Este ejercicio reúne estructura HTML, tablas, SEO y metadatos dentro de una página más cercana a un caso real.

---

# 📁 Estructura del proyecto

La organización general esperada del laboratorio es:

```text
Fase1/
└── lab1_html5/
    │
    ├── Experiencias_de_Trabajo/
    │   │
    │   ├── Experiencia1/
    │   │   └── index.html
    │   │
    │   ├── Experiencia2/
    │   │   ├── index.html
    │   │   ├── guardar.php
    │   │   └── mensajes.txt
    │   │
    │   ├── Experiencia3/
    │   │   └── index.html
    │   │
    │   └── Experiencia4/
    │       └── index.html
    │
    ├── Ejercicios/
    │   ├── Ejercicio1/
    │   │   └── index.html
    │   │
    │   ├── Ejercicio2/
    │   │   └── index.html
    │   │
    │   └── Ejercicio3/
    │       └── index.html
    │
    └── README.md
```

> La estructura de los ejercicios puede variar ligeramente según la implementación final de cada integrante.

---

# 🚀 Ejecución

La mayoría de los ejercicios pueden ejecutarse simplemente abriendo el archivo:

```text
index.html
```

en un navegador web.

También se puede utilizar una extensión como **Live Server** desde el editor.

---

## Ejecución del formulario con PHP

La Experiencia 2 contiene un archivo `guardar.php`, por lo que requiere un entorno con soporte para PHP.

Desde la carpeta correspondiente:

```bash
cd Experiencias_de_Trabajo/Experiencia2
```

Ejecutar:

```bash
php -S localhost:8000
```

Luego abrir:

```text
http://localhost:8000
```

---

# 🌐 Publicación con GitHub Pages

El proyecto utiliza Git para el control de versiones y GitHub como repositorio remoto.

Flujo básico:

```bash
git status
git add .
git commit -m "Actualización laboratorio HTML5"
git push origin main
```

GitHub Pages puede utilizarse para publicar los archivos HTML, CSS y JavaScript del laboratorio.

> **Importante:** GitHub Pages funciona como alojamiento estático, por lo que no procesa archivos PHP. Las funcionalidades que dependan de `guardar.php` deben ejecutarse en un servidor compatible.

---

# 🛠️ Tecnologías utilizadas

![HTML5](https://img.shields.io/badge/HTML5-Laboratorio-orange?logo=html5)
![CSS3](https://img.shields.io/badge/CSS3-Estilos-blue?logo=css3)
![PHP](https://img.shields.io/badge/PHP-Procesamiento-purple?logo=php)
![Git](https://img.shields.io/badge/Git-Control_de_versiones-red?logo=git)
![GitHub](https://img.shields.io/badge/GitHub-Repositorio-black?logo=github)

- **HTML5:** estructura y semántica.
- **CSS3:** presentación básica de las interfaces.
- **PHP:** procesamiento local del formulario.
- **Git:** control de versiones.
- **GitHub:** repositorio del proyecto.
- **GitHub Pages:** publicación de contenido estático.

---

# 💡 Conceptos aprendidos

Durante el laboratorio se trabajaron conceptos que sirven como base para el desarrollo de aplicaciones web:

**HTML y semántica:** se comprendió la diferencia entre representar visualmente un contenido y darle significado mediante la estructura HTML.

**Formularios:** se estudió cómo capturar información mediante controles y cómo asociar correctamente `<label>` e `<input>`.

**Validación:** se utilizaron restricciones nativas como `required`, `pattern`, `minlength`, `maxlength`, `min` y `max`.

**Cliente y servidor:** el uso de `POST` y PHP permitió diferenciar el procesamiento realizado por el navegador del procesamiento que necesita ejecutarse en un servidor.

**Tablas:** se utilizaron filas, celdas, encabezados, grupos de columnas y estilos aplicados a datos tabulares.

**SEO y metadata:** se trabajó con información que ayuda a describir un documento más allá del contenido visible.

**Open Graph y Twitter Cards:** se implementaron metadatos destinados a representar un enlace cuando es procesado por plataformas compatibles.

**Git y GitHub:** se utilizó control de versiones para organizar los cambios realizados durante el desarrollo.

**GitHub Pages:** se comprobó el funcionamiento y las limitaciones de un servicio de alojamiento de contenido estático.

---

# ⚠️ Consideraciones

- Mantener una estructura HTML válida y correctamente anidada.
- Utilizar etiquetas semánticas cuando corresponda.
- Asociar los `<label>` con los campos mediante `for` e `id`.
- No utilizar tablas únicamente para maquetar la página.
- Validar los datos ingresados por el usuario.
- No considerar la validación del cliente como una medida de seguridad suficiente.
- Mantener separados estructura HTML, presentación CSS y comportamiento cuando el proyecto aumente de complejidad.
- No almacenar contraseñas reales ni información sensible en archivos de texto.
- No subir credenciales, tokens o claves privadas al repositorio.
- Recordar que GitHub Pages no ejecuta código PHP.

---

# 👥 Integrantes

**Grupo N.° 03**

- Alexander Tomas Chipana Flores
- Luz Clarita Kana Zambrano
- Eduardo Gabriel Morales Cárdenas
- Eduardo Mateo Motta Flores

---

# 📚 Referencias

- Montesinos, Á., Sulla, J., Santillana, M., & Velazco, A. L. (2026). *Desarrollo de aplicaciones: Laboratorio 01 – HTML 5*. Universidad Católica de Santa María, Escuela Profesional de Ingeniería de Sistemas.
- GitHub. (2022). *GitHub Pages*. GitHub Docs.
- Mardan, A. (2018). *Full Stack JavaScript*. Apress.
- Matarazzo, D. (2021). *Aprenda los lenguajes HTML5, CSS3 y JavaScript para crear su primer sitio web*. Editorial ENI.
- Mozilla. (2022). *Learn HTML*. MDN Web Docs.
- Rubiales Gómez, M. (2018). *Curso de desarrollo web HTML, CSS y JavaScript*. Anaya Multimedia.

---

## 📄 Licencia

Proyecto desarrollado con fines académicos para el curso de **Desarrollo de Aplicaciones** de la Universidad Católica de Santa María.

---

<p align="center">
    <b>Laboratorio N.° 01 — HTML5</b><br>
    Escuela Profesional de Ingeniería de Sistemas — UCSM
</p>
