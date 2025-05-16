<form method="POST" action="{{ route() }}">
    @method("delete")
    @csrf

    <a class="underline" href="#" onclick="event.preventDefault();
                        this.closest('form').submit();">
        {{ $text }}
    </a>
</form>
