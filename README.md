# Ulern - Prueba Técnica

Este proyecto fue creado como prueba técnica para Ulern.

## Instrucciones
Objetivo de la prueba:
Implementar un sistema de login y registro utilizando las siguientes tecnologías:
- Backend: Laravel 11
- Frontend: Vue 3
- Estilos: TailwindCSS
- Base de Datos: SQLite

Requerimientos de la prueba:

Funcionalidades principales:
- Registro de usuario con los campos: nombre, apellido, número de teléfono, email y contraseña.
- Inicio de sesión con email y contraseña.
- Página de perfil donde se visualicen los datos del usuario registrado.

Detalles técnicos:
- Crea un repositorio único con el proyecto completo.
- En el archivo README.md del repositorio, incluye las instrucciones detalladas para instalar y ejecutar el proyecto localmente.
- Se debe utilizar SQLite como base de datos para facilitar la configuración.

Criterios de evaluación:
- Funcionalidad: Que el registro, login y la vista del perfil funcionen correctamente.
- Orden del código: Estructura clara, coherente y organizada.
- Efectividad de la solución: Que la implementación sea eficiente y cumpla los requerimientos de manera óptima.
- Buenas prácticas: Uso adecuado de estándares de código, manejo de errores, y claridad en la documentación.

# Guia de instalacion y ejecución
Este proyecto fue desarrollado y probado en un entorno Linux

## Requisitos

Asegúrate de tener las siguientes herramientas instaladas en tu sistema:

- **PHP** 8.1 o superior
- **Composer** (gestor de dependencias de PHP)
- **Laravel** (framework utilizado, incluido como dependencia)
- **Node.js** 20 o superior
- **NPM** (gestor de paquetes de Node.js)
- **SQLite** (base de datos utilizada)

## Pasos para Configuración

1. **Instalar las dependencias requeridas**  
Asegúrate de tener instalados todos los programas mencionados en los requisitos antes de continuar.

2. **Copiar el archivo de configuración base**  
Duplica el archivo `.env.example` y renómbralo a `.env`. Esto servirá como la configuración personalizada del entorno. Usa el siguiente comando:
```bash
   cp .env.example .env
```

3. **Instalar las dependencias del proyecto**  
Descarga e instala las dependencias de PHP y Node.js ejecutando:
```bash
composer install
npm install
```

4. **Ejecutar migraciones**  
Crea la estructura de la base de datos con las migraciones. Al ejecutar este comando, se te preguntará si deseas crear la base de datos. Responde con yes (presiona Enter)
```bash
php artisan migrate
```

5. **Generar la clave de la aplicación (APP_KEY)**
Genera la clave de cifrado necesaria para el funcionamiento de Laravel:
```bash
php artisan key:generate
```

6. **Iniciar el servidor de desarrollo**
Finalmente, ejecuta el servidor de desarrollo. Usa el siguiente comando para iniciar:
```bash
composer run dev
```
