@props(['name','value'=>''])
<x-form.input-wrapper>

    <x-form.input-label :name="$name"/>
    <div>
        <textarea class="  editor form-control" name="{{$name}}" id="{{$name}}" cols="85" rows="10" required>{!! old("$name","$value") !!} </textarea>
    </div>
    <x-error name="{{$name}}" />


</x-form.input-wrapper>
