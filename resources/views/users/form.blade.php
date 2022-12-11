@csrf
<div class="input-field col s12 m6 l6 xl6">
    <input type="text" id="name" name="name" class="validate" required value="{{$user->name ?? old('name')}}">
    <label for="name">Nombre:</label>
</div>

<div class="input-field col s12 m6 l6 xl6">
    <input type="number" id="phone" name="phone" class="validate" required value="{{$user->phone ?? old('phone')}}">
    <label for="phone">Teléfono:</label>
</div>

<div class="input-field col s12 m6 l6 xl6">
    <input type="email" id="email" name="email" class="validate" required value="{{$user->email ?? old('email')}}">
    <label for="email">Email:</label>
</div>

{{--Para ocultar estos campos en edit, si tiene edit no muesta, si no tiene es para crear--}}
@unless($user->id)
    <div class="input-field col s12 m6 l6 xl6">
        <input type="password" id="password" name="password" class="validate" required>
        <label for="password">Contraseña:</label>
    </div>
    <div class="input-field col s12 m6 l6 xl6">
        <input type="password" id="password_confirmation" name="password_confirmation" class="validate" required>
        <label for="password">Confirmar Contraseña:</label>
    </div>
@endunless

{{--Genera automaticamente checkbox, segun cantidad de perfiles--}}
<div class="input-field col s12 m6 l6 xl6">
    <p>
        @foreach($roles as $id => $name)
            <label>
                {{--Genera automaticamente checkbox, segun cantidad de perfiles--}}
                <input type="checkbox" class="filled-in" name="roles[]"
                       value="{{$id}}" {{$user->roles->pluck('id')->contains($id) ? 'checked' : ''}} />
                <span style="margin-right: 10px;
    padding-left: 25px">{{$name}}</span>
            </label>
        @endforeach
    </p>
</div>
