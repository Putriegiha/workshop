<div class="col {{$class}}">
    <label for="{{$id}}" class="form-label">
        {{ $label }}
    </label>

    <div class="input-group has-validation">
        @if ($type === 'textarea')
        <textarea id="{{$id}}" rows="3" type="{{$type}}" class="form-control @error($name) is-invalid @enderror"
            name="{{$name}}" value="{{$value}}" placeholder="{{$placeholder}}">
        </textarea>
        @elseif ($type === 'image')
        <input id="{{$id}}" type="file" class="mb-2 form-control @error($name) is-invalid @enderror" name="{{$name}}"
            value="{{$value}}" accept="image/*" onchange="preview(event)">
        @else
        <input id="{{$id}}" type="{{$type}}" class="form-control @error($name) is-invalid @enderror" name="{{$name}}"
            value="{{$value}}" placeholder="{{$placeholder}}">
        @endif

        @error($name)
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
    </div>

    @if ($type === 'image')
    <img id="{{'output' . $id}}" style="max-width: 250px; max-height: 250px" />
    <script>
        function preview(event) {
            let output = document.getElementById('{{"output$id"}}');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src) // free memory
            }
        }
    </script>
    @endif
</div>