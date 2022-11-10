# Templates development guide

### Overview
All views are stored in **resources/views/**

**base/** directory contains basic templates, such as headers, footers, etc.

**base/commonTemplate.blade.php** is a base template which contents all main HTML blocks and includes Bootstrap (CSS and JS)

It is recommended to inherit base templates to avoid code duplication

### Base template usage
To inherit template you need to do following:

1. Add to file "@extends" annotation:
2. Check available sections of base template
3. Open HTML block with "@section" annotation:
4. Write some HTML markup
5. Close HTML block with "@endsection" annotation

```html
@extends('base.commonTemplate')
@section('body')
<h1>Hello, world!</h1>
@endsection
```

Please note that if you use **base/commonTemplate.blade.php** as base template, you don't need to write main HTML blocks' tags.
This template already has initialization of all main blocks.

Instead of it just put your code in required section


**WRONG:**
```html
@section('body')
<body>
<h1>Hello, world!</h1>
</body>
@endsection
```

**RIGHT:**
```html
@section('body')
<h1>Hello, world!</h1>
@endsection
```
