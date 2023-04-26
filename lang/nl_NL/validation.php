<?php

return [

    /*
    |--------------------------------------------------------------------------
    | nl_NL
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'Het veld :attribute moet worden geaccepteerd.',
    'accepted_if' => 'Het veld :attribute moet worden geaccepteerd wanneer :other :value is.',
    'active_url' => 'Het veld :attribute is geen geldige URL.',
    'after' => 'Het veld :attribute moet een datum na :date zijn.',
    'after_or_equal' => 'Het veld :attribute moet een datum na of gelijk aan :date zijn.',
    'alpha' => 'Het veld :attribute mag alleen letters bevatten.',
    'alpha_dash' => 'Het veld :attribute mag alleen letters, cijfers, streepjes en liggende streepjes bevatten.',
    'alpha_num' => 'Het veld :attribute mag alleen letters en cijfers bevatten.',
    'array' => 'Het veld :attribute moet een array zijn.',
    'ascii' => 'Het veld :attribute mag alleen ASCII karakters bevatten.',
    'before' => 'Het veld :attribute moet een datum voor :date zijn.',
    'before_or_equal' => 'Het veld :attribute moet een datum voor of gelijk aan :date zijn.',
    'between' => [
        'array' => 'Het veld :attribute moet tussen :min en :max items bevatten.',
        'file' => 'Het veld :attribute moet tussen :min en :max kilobytes zijn.',
        'numeric' => 'Het veld :attribute moet tussen :min en :max zijn.',
        'string' => 'Het veld :attribute moet tussen :min en :max karakters zijn.',
    ],
    'boolean' => 'Het veld :attribute moet true of false zijn.',
    'confirmed' => 'Het veld :attribute bevestiging komt niet overeen.',
    'current_password' => 'Het wachtwoord is onjuist.',
    'date' => 'Het veld :attribute is geen geldige datum.',
    'date_equals' => 'Het veld :attribute moet een datum gelijk aan :date zijn.',
    'date_format' => 'Het veld :attribute komt niet overeen met het formaat :format.',
    'decimal' => 'Het veld :attribute moet een decimaal getal zijn.',
    'declined' => 'Het veld :attribute moet worden afgewezen.',
    'declined_if' => 'Het veld :attribute moet worden afgewezen wanneer :other :value is.',
    'different' => 'Het veld :attribute en :other moeten verschillend zijn.',
    'digits' => 'Het veld :attribute moet :digits cijfers zijn.',
    'digits_between' => 'Het veld :attribute moet tussen :min en :max cijfers zijn.',
    'dimensions' => 'Het veld :attribute heeft ongeldige afbeeldingsafmetingen.',
    'distinct' => 'Het veld :attribute heeft een dubbele waarde.',
    'doesnt_end_with' => 'Het veld :attribute moet eindigen met een van de volgende waarden: :values.',
    'doesnt_start_with' => 'Het veld :attribute moet beginnen met een van de volgende waarden: :values.',
    'email' => 'Het veld :attribute moet een geldig e-mailadres zijn.',
    'ends_with' => 'Het veld :attribute moet eindigen met een van de volgende waarden: :values.',
    'enum' => 'Het veld :attribute is ongeldig.',
    'exists' => 'Het geselecteerde :attribute is ongeldig.',
    'file' => 'Het veld :attribute moet een bestand zijn.',
    'filled' => 'Het veld :attribute moet een waarde hebben.',
    'gt' => [
        'array' => 'Het veld :attribute moet meer dan :value items bevatten.',
        'file' => 'Het veld :attribute moet groter zijn dan :value kilobytes.',
        'numeric' => 'Het veld :attribute moet groter zijn dan :value.',
        'string' => 'Het veld :attribute moet groter zijn dan :value karakters.',
    ],
    'gte' => [
        'array' => 'Het veld :attribute moet :value items of meer bevatten.',
        'file' => 'Het veld :attribute moet groter zijn dan of gelijk zijn aan :value kilobytes.',
        'numeric' => 'Het veld :attribute moet groter zijn dan of gelijk zijn aan :value.',
        'string' => 'Het veld :attribute moet groter zijn dan of gelijk zijn aan :value karakters.',
    ],
    'image' => 'Het veld :attribute moet een afbeelding zijn.',
    'in' => 'Het geselecteerde :attribute is ongeldig.',
    'in_array' => 'Het veld :attribute bestaat niet in :other.',
    'integer' => 'Het veld :attribute moet een geheel getal zijn.',
    'ip' => 'Het veld :attribute moet een geldig IP-adres zijn.',
    'ipv4' => 'Het veld :attribute moet een geldig IPv4-adres zijn.',
    'ipv6' => 'Het veld :attribute moet een geldig IPv6-adres zijn.',
    'json' => 'Het veld :attribute moet een geldige JSON-string zijn.',
    'lowercase' => 'Het veld :attribute moet alleen kleine letters bevatten.',
    'lt' => [
        'array' => 'Het veld :attribute moet minder dan :value items bevatten.',
        'file' => 'Het veld :attribute moet kleiner zijn dan :value kilobytes.',
        'numeric' => 'Het veld :attribute moet kleiner zijn dan :value.',
        'string' => 'Het veld :attribute moet kleiner zijn dan :value karakters.',
    ],
    'lte' => [
        'array' => 'Het veld :attribute mag niet meer dan :value items bevatten.',
        'file' => 'Het veld :attribute moet kleiner zijn dan of gelijk zijn aan :value kilobytes.',
        'numeric' => 'Het veld :attribute moet kleiner zijn dan of gelijk zijn aan :value.',
        'string' => 'Het veld :attribute moet kleiner zijn dan of gelijk zijn aan :value karakters.',
    ],
    'mac_address' => 'Het veld :attribute moet een geldig MAC-adres zijn.',
    'max' => [
        'array' => 'Het veld :attribute mag niet meer dan :max items bevatten.',
        'file' => 'Het veld :attribute mag niet groter zijn dan :max kilobytes.',
        'numeric' => 'Het veld :attribute mag niet groter zijn dan :max.',
        'string' => 'Het veld :attribute mag niet groter zijn dan :max karakters.',
    ],
    'max_digits' => 'Het veld :attribute mag niet meer dan :max cijfers bevatten.',
    'mimes' => 'Het veld :attribute moet een bestand zijn van het bestandstype: :values.',
    'mimetypes' => 'Het veld :attribute moet een bestand zijn van het bestandstype: :values.',
    'min' => [
        'array' => 'Het veld :attribute moet minimaal :min items bevatten.',
        'file' => 'Het veld :attribute moet minimaal :min kilobytes zijn.',
        'numeric' => 'Het veld :attribute moet minimaal :min zijn.',
        'string' => 'Het veld :attribute moet minimaal :min karakters zijn.',
    ],
    'min_digits' => 'Het veld :attribute moet minimaal :min cijfers bevatten.',
    'missing' => 'Het veld :attribute is vereist.',
    'missing_if' => 'Het veld :attribute is vereist wanneer :other :value is.',
    'missing_unless' => 'Het veld :attribute is vereist tenzij :other in :values zit.',
    'missing_with' => 'Het veld :attribute is vereist wanneer :values aanwezig is.',
    'missing_with_all' => 'Het veld :attribute is vereist wanneer :values aanwezig is.',
    'multiple_of' => 'Het veld :attribute moet een veelvoud zijn van :value',
    'not_in' => 'Het geselecteerde :attribute is ongeldig.',
    'not_regex' => 'Het veld :attribute formaat is ongeldig.',
    'numeric' => 'Het veld :attribute moet een getal zijn.',
    'password' => [
        'letters' =>  'Het veld :attribute moet minimaal één letter bevatten.',
        'mixed' => 'Het veld :attribute moet minimaal één letter en één cijfer bevatten.',
        'numbers' => 'Het veld :attribute moet minimaal één cijfer bevatten.',
        'symbols' => 'Het veld :attribute moet minimaal één symbool bevatten.',
        'uncompromised' => 'Het wachtwoord is gecompromitteerd.',
    ],
    'present' => 'Het veld :attribute moet aanwezig zijn.',
    'prohibited' => 'Het veld :attribute is verboden.',
    'prohibited_if' => 'Het veld :attribute is verboden wanneer :other :value is.',
    'prohibited_unless' => 'Het veld :attribute is verboden tenzij :other in :values zit.',
    'prohibits' => 'The :attribute field prohibits :other from being present.',
    'regex' => 'Het veld :attribute formaat is ongeldig.',
    'required' => 'Het veld :attribute is vereist.',
    'required_array_keys' => 'Het veld :attribute moet alle volgende waarden bevatten: :keys.',
    'required_if' => 'Het veld :attribute is vereist wanneer :other :value is.',
    'required_if_accepted' => 'Het veld :attribute is vereist wanneer :other geaccepteerd is.',
    'required_unless' => 'Het veld :attribute is vereist tenzij :other in :values zit.',
    'required_with' => 'Het veld :attribute is vereist wanneer :values aanwezig is.',
    'required_with_all' => 'Het veld :attribute is vereist wanneer :values aanwezig is.',
    'required_without' => 'Het veld :attribute is vereist wanneer :values niet aanwezig is.',
    'required_without_all' => 'Het veld :attribute is vereist wanneer geen van :values aanwezig is.',
    'same' => 'Het veld :attribute en :other moeten overeenkomen.',
    'size' => [
        'array' => 'Het veld :attribute moet :size items bevatten.',
        'file' => 'Het veld :attribute moet :size kilobytes zijn.',
        'numeric' => 'Het veld :attribute moet :size zijn.',
        'string' => 'Het veld :attribute moet :size karakters zijn.',
    ],
    'starts_with' => 'Het veld :attribute moet beginnen met één van de volgende: :values.',
    'string' => 'Het veld :attribute moet een string zijn.',
    'timezone' => 'Het veld :attribute moet een geldige zone zijn.',
    'unique' => 'Het veld :attribute is al in gebruik.',
    'uploaded' => 'Het veld :attribute kon niet worden geüpload.',
    'uppercase' => 'Het veld :attribute moet hoofdletters bevatten.',
    'url' => 'Het veld :attribute formaat is ongeldig.',
    'ulid' => 'Het veld :attribute moet een geldige ULID zijn.',
    'uuid' => 'Het veld :attribute moet een geldige UUID zijn.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
