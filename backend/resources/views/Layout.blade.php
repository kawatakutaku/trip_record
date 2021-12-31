<!-- TODO layoutをlaravelに合うように変更する -->
<!doctype html>
{% load boost %}
{% load humanize %}
<html lang="ja">
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.css">
        <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    </head>
    <body class="h-100 text-center" style="background-color: rgba(110, 155, 94, 0.47);">
        <nav class="navbar navbar-expand-sm navbar-light p-30" style="background-color: rgba(101, 152, 106, 0.99);">
            <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    {% if user.is_authenticated %}
                    <li class="nav-item">
                        <a class="nav-link" href="{% url 'make_trip:create_trip' %}">旅行作成</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{% url 'make_trip:myPage' %}">マイページ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{% url 'make_trip:groups' %}">グループ一覧</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{% url 'make_trip:add_group' %}">グループ参加</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{% url 'account_change_password' %}">パスワードの変更</a>
                    </li>
                    {% else %}
                    <li class="nav-item">
                        <a class="nav-link" href="{% url 'account_login' %}">ログイン</a>
                    </li>
                    {% endif %}
                    <li class="nav-item">
                        <a class="nav-link" href="{% url 'account_reset_password' %}">パスワードのリセット</a>
                    </li>
                    {% if user.is_authenticated %}
                    <li class="nav-item">
                        <a class="nav-link" href="{% url 'make_trip:logout' %}">ログアウト</a>
                    </li>
                    {% endif %}
                </ul>
                {% block navigation %} {% endblock %}
                {% if user.is_authenticated %}
                    <span class="h6 text-light mb-0">ようこそ、{{ user.username }}さん</span>
                {% endif %}
            </div>
        </nav>
        {% block container %}{% endblock %}
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        {% block js %} {% endblock %}
    </body>
</html>