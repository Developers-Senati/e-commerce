<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .carrito-container {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            flex-wrap: wrap;
        }

        .productos-container {
            flex: 1;
            max-width: 65%;
        }

        .producto-item {
            display: flex;
            align-items: center;
            border: 1px solid #ddd;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 8px;
            background-color: white;
            font-size: 14px;
        }

        .producto-item img {
            width: 80px;
            height: 80px;
            object-fit: contain;
            margin-right: 15px;
        }

        .producto-info h5 {
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .producto-info .marca {
            font-size: 12px;
            color: #666;
        }

        .producto-info .vendedor {
            font-size: 12px;
            color: #999;
        }

        .producto-info .descuento {
            color: white;
            background-color: #dc3545;
            font-weight: bold;
            padding: 2px 5px;
            border-radius: 4px;
            font-size: 12px;
            margin-left: 10px;
        }

        .producto-info .precio {
            font-size: 16px;
            font-weight: bold;
            color: #333;
        }

        .producto-info .precio-original {
            font-size: 14px;
            text-decoration: line-through;
            color: #999;
            margin-left: 10px;
        }

        .alert-stock {
            font-size: 12px;
            background-color: #ffecec;
            color: #e60000;
            padding: 2px 5px;
            border-radius: 4px;
            display: inline-block;
            margin-top: 5px;
        }

        .cantidad {
            display: flex;
            align-items: center;
            gap: 5px;
            margin-left: auto;
        }

        .cantidad button {
            padding: 0 8px;
        }

        .cantidad input {
            width: 40px;
            text-align: center;
            border-radius: 4px;
        }

        .max-unidad {
            font-size: 12px;
            color: #e60000;
            margin-top: 5px;
        }

        .resumen-container {
            flex: 1;
            max-width: 30%;
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 15px;
            background-color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .resumen-container h4 {
            font-size: 20px;
            margin-bottom: 20px;
        }

        .total {
            font-size: 18px;
            font-weight: bold;
            color: #333;
        }

        .btn-continuar-compra {
            width: 100%;
            background-color: #686767;
            color: white;
            border-radius: 20px;
        }

        .alert-info {
            text-align: center;
            border-radius: 10px;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h2>Carrito (1 producto)</h2>
        <br>
        <div class="carrito-container">
            <!-- Lista de Productos -->
            <div class="productos-container">
                <div class="producto-item">
                    <input type="checkbox" class="form-check-input me-3" checked>
                    <img src="https://via.placeholder.com/80" alt="Producto">
                    <div class="producto-info">
                        <h5>Convertidor a Smart TV Google Chromecast 4G 4K 2160p Incluye Control</h5>
                        <p class="marca">GOOGLE</p>
                        <p class="vendedor">Vendido por Tiendas Efe</p>
                        <p>
                            <span class="precio">S/ 249</span>
                            <span class="precio-original">S/ 349</span>
                            <span class="descuento">-29%</span>
                        </p>
                        <span class="alert-stock">Últimas unidades</span>
                    </div>
                    <div class="cantidad">
                        <button type="button" class="btn btn-outline-secondary btn-sm">-</button>
                        <input type="number" value="1" min="1" class="form-control">
                        <button type="button" class="btn btn-outline-secondary btn-sm">+</button>
                    </div>
                    <p class="max-unidad">Máx 1 unidad</p>
                </div>
            </div>

            <!-- Resumen del pedido -->
            <div class="resumen-container">
                <h4>Resumen de la orden</h4>
                <p><strong>Productos (1)</strong>: S/ 349.00</p>
                <hr>
                <p><strong>Descuento:</strong> <span class="text-danger">-S/ 100.00</span></p>
                <hr>
                <p class="total">Total: S/ 249.00</p>
                <a href="{{route('proceso-compra.index')}}" class="btn btn-continuar-compra btn-secondary">Continuar
                compra</a>
            </div>
        </div>


    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>