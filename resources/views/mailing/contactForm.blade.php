<html>
    <head>

    </head>
    <body style="background:#222; padding:10%;">
        <div style="width:80%; padding:20%;">
            <h3>Nowa wiadomość na rzbr.pl:</h3>
            <b>Od kogo:</b> {{$data->name}}<br />
            <b>Email:</b> {{$data->email}}<br />
            <b>Temat:</b> {{$data->subject}}<br />
            <b>Treść wiadomości:</b> <br />
            {!!nl2br($data->content)!!}
        </div>
    </body>
</html>