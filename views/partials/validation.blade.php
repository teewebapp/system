@if(isset($errors))
    @if($errors->any())
        <div class="callout callout-danger" role="alert">
            <h4>Atenção</h4>
            <p>
                <ul>
                    @foreach($errors->all() as $message)
                    <li>
                        {{ $message }}
                    </li>
                    @endforeach
                </ul>
            </p>
        </div>
    @endif
@endif