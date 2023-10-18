<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fomularios</title>
</head>
<style>
    h1
    {
       position: relative;
       left: 38vw;
       color: green;
       text-shadow: 0.15vw 0vw black;
       font-size: 3vw
    }
    body
    {
        width: 100vw;
        overflow-x: hidden;
        padding: 0;
        margin: 0;
        background: rgba(200, 226, 250, 0.918)
    }
    section
    {
        margin: auto;
        width: 52vw;
    }
    .guardar
    {
        width: 8vw;
        height: 1.5vw;
        background-color: rgb(113, 255, 47);
        border: none;
        border-radius: 0.3vw;
    }
    .guardar:hover
    {
        background-color: rgb(26, 163, 45);
        cursor: pointer;
    }
    #tabla
    {
        width: 50vw;
        height: 20vw;
        background: rgba(230, 229, 229, 0.726);
        overflow-y: hidden;
        border-radius: 1vw;
        margin-bottom: 1vw;
        box-shadow: 0vw 0vw 0.7vw 0.01vw black;
        overflow-y: scroll;
    }
    input
    {
        outline: none;
        border: none;
        width: 8vw;
        height: 1.5vw;
        border-radius: 0.3vw;
    }
    select
    {
        outline: none;
        border: none;
        width: 8vw;
        height: 1.5vw;
        border-radius: 0.3vw;
        margin-left: 1vw
    }
    .namec
    {
        width: 10vw;
        height: 1.3vw;
        position: absolute;
        left:25vw;
        border-radius: 0.5vw;
        border: 0.1vw solid gray;
    }
    .eliminarc
    {
        width: 8vw;
        height: 1.5vw;
        position: absolute;
        left:39vw;
        background-color: red;
        border-radius: 0.3vw;
        color: white;
        border: none;
    }
    .eliminarc:hover
    {
        cursor: pointer;
        background-color: rgb(150, 41, 41);

    }
    .numeroi
    {
        width: 10vw;
        height: 1.3vw;
        position: absolute;
        left: 25vw;
        border-radius: 0.5vw;
        border: 0.1vw solid gray;
    }
    .agregari
    {
        width: 8vw;
        height: 1.5vw;
        border-radius: 0.3vw;
        background-color: rgb(113, 255, 47);
        position: absolute;
        left: 39vw;
        border: none;
    }
    .agregari:hover
    {
        cursor: pointer;
        background-color: rgb(26, 163, 45);
    }
    #elemento
    {
        border-radius: 0.5vw;
        left: 25vw;
        position: absolute;
        height: 2.2vw;
        width: 40vw;
        background: rgba(212, 212, 212, 0.74);
        display: flex;
        align-items: center;
        flex-direction: row;
    }
</style>
<body>
    <h1>Agregar Formulario</h1>


    <section>
        <form action="{{route('store')}}" method="post">
        @csrf
        <input name="definitivo" class="guardar" type="submit" value="Guardar Formulario">
        <input name="namef" type="text" value="{{old('namef')}}" placeholder="nombre del formulario">
        @error('namef')
        <small style="font-size: 0.5vw;">{{$message}}</small>
        @enderror
        <input name="numeroCategorias" value="{{old('numeroCategorias')}}" type="number" min="0" placeholder="numero de categorias">
        @error('numeroCategorias')
        <small style="font-size: 0.5vw;">{{$message}}</small>
        @enderror

        <input name="definitivo" class="guardar" type="submit" value="Agregar Categoria">
        <br><br>
        @for ($i=0 ;$i < old('numeroCategorias'); $i++)
            <div class="{{'tabla'.$i}}" id="tabla">
                <br>
                <input class="namec" placeholder="Nombre De La Categoria" name="vector[{{$i}}][nameCategoria]" type="text" value="{{ old('vector.' . $i . '.nameCategoria') }}">
                <input class="eliminarc" type="submit" name="definitivo" value="Eliminar Categoria">
                <br><br>
                <input class="numeroi" placeholder="Numero De Elementos" name="vector[{{$i}}][numeroItem]" min="0" type="number" value="{{ old('vector.' . $i . '.numeroItem')}}">
                <input class="agregari" type="submit" name="definitivo" value="Agregar Elementos">
                @for ($h=0 ;$h < old('vector.' . $i . '.numeroItem') ; $h++)
                <br><br>
                <div id="elemento" class="{{'elemento'.$i}}">
                    <input placeholder="Nombre Del Elemento" name="vector[{{$i}}][nameElemento]" type="text" value="{{ old('vector.' . $i . '.nameElemento')}}">
                    <select name="vector[{{$i}}][item_type]" id="">
                    @foreach ($tipos as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
                </div>
                @endfor
            </div>
        @endfor
        </form>
    </section>
</body>
<script>

</script>
</html>