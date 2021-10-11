<!DOCTYPE HTML>
<head>

    <script src="https://cdn.tiny.cloud/1/{{config('larablog.tinymce_key')}}/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <style>
        * {font-family: sans-serif;}body {background: #f1f1f1;}.button {text-decoration: none;border: none;background: rgba(31, 41, 55,1);color: white;border-radius: 0.2em;font-weight: 500;font-size: .875rem;line-height: 1.25rem;padding: .5rem 1rem;}input[type="text"], textarea {width: 100%;padding: 5px;box-shadow: 0 0 0 transparent;border-radius: 4px;border: 1px solid #8c8f94;background-color: #fff;color: #2c3338;box-sizing: border-box;}textarea {resize: none;height: 5rem;}.title-input-wrapper {margin-bottom: 15px;}input[type="text"]#title {padding: 12px;font-size: 20px;}input[type="text"]#slug {width: auto;padding: 3px;font-size: 14px;}.ql-toolbar.ql-snow {background: #F6F7F7;}select {font-size: 14px;line-height: 2;color: #2c3338;border-color: #8c8f94;box-shadow: none;border-radius: 3px;padding: 0 24px 0 8px;min-height: 30px;max-width: 25rem;-webkit-appearance: none;background: #fff url(data:image/svg+xml;charset=US-ASCII,%3Csvg%20width%3D%2220%22%20height%3D%2220%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%3E%3Cpath%20d%3D%22M5%206l5%205%205-5%202%201-7%207-7-7%202-1z%22%20fill%3D%22%23555%22%2F%3E%3C%2Fsvg%3E) no-repeat right 5px top 55%;background-size: 16px 16px;cursor: pointer;vertical-align: middle;}.table-border{border-color:lightgrey;border-width:1px;border-style: solid;}.table-border-bottom{border-bottom-color:lightgrey;border-bottom-width:1px;border-bottom-style: solid;}.mt-2 {margin-top: 0.5rem;}.p-2{padding: 0.5rem;}.p-2\.5{padding: 0.625rem;}.p-3 {padding: 0.75rem;}.px-2\.5{padding: 0px 10px;}.flex {display: flex;}.flex-1{flex: 1;}.flex-3{flex: 3;}.justify-between {justify-content: space-between;}.gap-2\.5{gap: 0.625rem;}.w-40 {width: 10rem;}.w-full{width: 100%;}.h-full{height: 100%;}.ql-editor {height: 100vh!important;}
    </style>
</head>
<body>
@yield('body')
</body>