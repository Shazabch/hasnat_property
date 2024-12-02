@if ($schema && $schema->schema)
    @push('schemas')
        <script type="application/ld+json">
            {!! $schema->schema !!}
        </script>
    @endpush
@endif