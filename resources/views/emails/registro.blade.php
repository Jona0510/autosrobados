<x-mail::message>

<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1, h2, h3, h4, h5, h6 {
            margin-top: 0;
            color: #333;
        }
        p {
            margin-bottom: 20px;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }
        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Hola,</h1>
        <p>Su vehículo marca <strong>{{ $autosrobado->Marca }} {{ $autosrobado->Modelo }}</strong> ha sido registrado como robado.</p>
        <p>Detalles del vehículo:</p>
        <ul>
            <li>Marca: {{ $autosrobado->Marca }}</li>
            <li>Modelo: {{ $autosrobado->Modelo }}</li>
            <li>Fecha de robo: {{ $autosrobado->Fecha_robo }}</li>
            <li>Estatus: {{ $autosrobado->Estatus }}</li>
        </ul>
        <p>Para más información, acuda con el agente <strong>{{ $autosrobado->user->name }}</strong>.</p>
        <p>Gracias.</p>
    </div>
</body>
</x-mail::message>