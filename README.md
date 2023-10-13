```php
$funxtion = new \Funxtion\Funxtion(
    token: '123123123',
    url: '123123123',
);

// Get a list of exercises
$funxtion->exercises()->list(
    new \Funxtion\Filters\WhereFilter(
        key: 'name',
        value: 'Steve',
        operator: \Funxtion\Enums\Operator::CONTAINS,
    ),
    new \Funxtion\Filters\WhereFilter(
        key: 'equipment',
        value: '1,2',
        operator: \Funxtion\Enums\Operator::IN,
    ),
);
```

```php
class FunxtionService
{
    public function __construct(
        private readonly \Funxtion\Funxtion $funxtion,
    ) {}
    
    public function listExercise()
    {
        $response = $this->funxtion->exercises()->list();
        
        return array_map(
            callback: fn (array $item) => \Funxtion\ValueObjects\ExerciseCollectionItem::fromArray(
                data: $item,
            ),
            array: json_decode(
                json: $response->getBody()->getContents(),
                associative: true,
                flags: JSON_THROW_ON_ERROR,
            )['data'],
        );
    }
}
```
