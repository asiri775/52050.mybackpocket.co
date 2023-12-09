@php 
$variableArray = array(
    'first_name' => ucfirst($first_name),
    'last_name' => ucfirst($last_name),
);

$templateHTML = $template['content'];

foreach ($variableArray as $key => $value) {
    $templateHTML = str_replace("{".$key."}", $value, $templateHTML);
}

@endphp

{!! $templateHTML !!}