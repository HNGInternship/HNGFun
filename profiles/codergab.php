<?php 

    $result = $conn->query("Select * from secret_word LIMIT 1");

    $result = $result->fetch(PDO::FETCH_OBJ);

    $secret_word = $result->secret_word;

    $result2 = $conn->query("Select * from interns_data where username = 'codergab'");
    $user = $result2->fetch(PDO::FETCH_OBJ);

    // echo $user->name;
    
?>

   <!DOCTYPE html>
   <html>
   <head>
       <meta charset="utf-8" />
       <meta http-equiv="X-UA-Compatible" content="IE=edge">
       <title></title>
       <meta name="viewport" content="width=device-width, initial-scale=1">
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
       <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
       <link rel="stylesheet" href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css">
       <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
       <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
       <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
        .jumbotron {
            background-color: #fcfcfc;
            border-radius: .3rem;
            box-shadow: 0px 0px 14px 5px #d8d8d821;
        }
        h1,h2,h3,h4,h5,h6 {
            color: #444 !important;
        }
       </style>
   </head>
   <body>

<!-- Bot -->
<div class="modal fade" id="bot" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header"> 
                <h4 class="modal-title">
                <button type="button" class="btn btn-danger btn-sm mr-auto" data-dismiss="modal">End Conversation</button>
                <img width="30" src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTkuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgdmlld0JveD0iMCAwIDQ4MCA0ODAiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDQ4MCA0ODA7IiB4bWw6c3BhY2U9InByZXNlcnZlIiB3aWR0aD0iNTEycHgiIGhlaWdodD0iNTEycHgiPgo8Zz4KCTxwYXRoIHN0eWxlPSJmaWxsOiNENDVCNUI7IiBkPSJNMzEuNjU2LDIyNS41NzZjMC44NzItMC4zMiwxLjc2LTAuNjA4LDIuNjcyLTAuODMyQzMzLjQwOCwyMjQuOTc2LDMyLjUyLDIyNS4yNDgsMzEuNjU2LDIyNS41NzZ6Ii8+Cgk8cGF0aCBzdHlsZT0iZmlsbDojRDQ1QjVCOyIgZD0iTTQwLDI3MmMtMS41NzYsMC0zLjExMi0wLjE3Ni00LjYwOC0wLjQ2NEMzNi44OCwyNzEuODMyLDM4LjQxNiwyNzIsNDAsMjcyeiIvPgoJPHBhdGggc3R5bGU9ImZpbGw6I0Q0NUI1QjsiIGQ9Ik0zNS43MTIsMjI0LjQzMkMzNy4xMDQsMjI0LjE3NiwzOC41MjgsMjI0LDQwLDIyNEMzOC41MjgsMjI0LDM3LjEwNCwyMjQuMTc2LDM1LjcxMiwyMjQuNDMyeiIvPgoJPHBhdGggc3R5bGU9ImZpbGw6I0Q0NUI1QjsiIGQ9Ik0yNi44OTYsMjI3LjkyOGMxLjA0LTAuNjgsMi4xMzYtMS4yNjQsMy4yNzItMS43NzZDMjkuMDMyLDIyNi42NjQsMjcuOTM2LDIyNy4yNDgsMjYuODk2LDIyNy45Mjh6Ii8+Cgk8cGF0aCBzdHlsZT0iZmlsbDojRDQ1QjVCOyIgZD0iTTMyLjI5NiwyNzAuNjI0Yy0wLjM2LTAuMTItMC43NDQtMC4yLTEuMDk2LTAuMzQ0QzMxLjU1MiwyNzAuNDI0LDMxLjkzNiwyNzAuNDk2LDMyLjI5NiwyNzAuNjI0eiIvPgoJPHBhdGggc3R5bGU9ImZpbGw6I0Q0NUI1QjsiIGQ9Ik0yNy40NjQsMjY4LjM4NGMtMC4wMTYtMC4wMDgtMC4wMzItMC4wMTYtMC4wNDgtMC4wMjQgICBDMjcuNDMyLDI2OC4zNjgsMjcuNDQ4LDI2OC4zNjgsMjcuNDY0LDI2OC4zODR6Ii8+Cgk8cGF0aCBzdHlsZT0iZmlsbDojRDQ1QjVCOyIgZD0iTTE2NC41ODQsMjY4LjM2Yy0wLjAxNiwwLjAwOC0wLjAzMiwwLjAxNi0wLjA0OCwwLjAyNCAgIEMxNjQuNTUyLDI2OC4zNjgsMTY0LjU2OCwyNjguMzY4LDE2NC41ODQsMjY4LjM2eiIvPgoJPHBhdGggc3R5bGU9ImZpbGw6I0Q0NUI1QjsiIGQ9Ik0xNTIsMjI0YzEuNDcyLDAsMi44OTYsMC4xNzYsNC4yODgsMC40MzJDMTU0Ljg5NiwyMjQuMTc2LDE1My40NzIsMjI0LDE1MiwyMjR6Ii8+Cgk8cGF0aCBzdHlsZT0iZmlsbDojRDQ1QjVCOyIgZD0iTTE1Ny42NzIsMjI0Ljc1MmMwLjkxMiwwLjIyNCwxLjgsMC41MDQsMi42NzIsMC44MzIgICBDMTU5LjQ4LDIyNS4yNDgsMTU4LjU5MiwyMjQuOTc2LDE1Ny42NzIsMjI0Ljc1MnoiLz4KCTxwYXRoIHN0eWxlPSJmaWxsOiNENDVCNUI7IiBkPSJNMTU2LjYwOCwyNzEuNTM2QzE1NS4xMTIsMjcxLjgyNCwxNTMuNTc2LDI3MiwxNTIsMjcyQzE1My41ODQsMjcyLDE1NS4xMiwyNzEuODMyLDE1Ni42MDgsMjcxLjUzNnogICAiLz4KCTxwYXRoIHN0eWxlPSJmaWxsOiNENDVCNUI7IiBkPSJNMTYxLjgzMiwyMjYuMTUyYzEuMTM2LDAuNTEyLDIuMjQsMS4wOTYsMy4yNzIsMS43NzYgICBDMTY0LjA2NCwyMjcuMjQ4LDE2Mi45NjgsMjI2LjY2NCwxNjEuODMyLDIyNi4xNTJ6Ii8+Cgk8cGF0aCBzdHlsZT0iZmlsbDojRDQ1QjVCOyIgZD0iTTE2MC44LDI3MC4yOGMtMC4zNTIsMC4xNDQtMC43MzYsMC4yMTYtMS4wOTYsMC4zNDRDMTYwLjA2NCwyNzAuNDk2LDE2MC40NDgsMjcwLjQyNCwxNjAuOCwyNzAuMjh6ICAgIi8+CjwvZz4KPGc+Cgk8cGF0aCBzdHlsZT0iZmlsbDojRTREOUIzOyIgZD0iTTEyMCwyODh2MzJoNDh2LTU0LjIzMmMtMS4wNjQsMC45Ni0yLjE5MiwxLjgyNC0zLjQxNiwyLjU4NGMtMC4wMTYsMC4wMDgtMC4wMzIsMC4wMTYtMC4wNDgsMC4wMjQgICBjLTEuMTg0LDAuNzI4LTIuNDI0LDEuMzg0LTMuNzM2LDEuOTA0Yy0wLjM1MiwwLjE0NC0wLjczNiwwLjIxNi0xLjA5NiwwLjM0NGMtMS4wMTYsMC4zNDQtMi4wMjQsMC43MDQtMy4wOTYsMC45MTIgICBDMTU1LjEyLDI3MS44MzIsMTUzLjU4NCwyNzIsMTUyLDI3MmMtMTMuMjU2LDAtMjQtMTAuNzQ0LTI0LTI0czEwLjc0NC0yNCwyNC0yNGMxLjQ3MiwwLDIuODk2LDAuMTc2LDQuMjg4LDAuNDMyICAgYzAuNDcyLDAuMDg4LDAuOTI4LDAuMiwxLjM4NCwwLjMxMmMwLjkxMiwwLjIyNCwxLjgsMC41MDQsMi42NzIsMC44MzJjMC41MDQsMC4xODQsMSwwLjM2LDEuNDg4LDAuNTc2ICAgYzEuMTM2LDAuNTIsMi4yNCwxLjA5NiwzLjI3MiwxLjc3NmgwLjAwOEMxNTYuNDA4LDE5Ny45NDQsMTI4Ljc5MiwxNzYsOTYsMTc2cy02MC40MDgsMjEuOTQ0LTY5LjEwNCw1MS45MjhoMC4wMDggICBjMS4wNC0wLjY4LDIuMTM2LTEuMjU2LDMuMjcyLTEuNzc2YzAuNDgtMC4yMTYsMC45ODQtMC4zOTIsMS40ODgtMC41NzZjMC44NzItMC4zMjgsMS43NTItMC42LDIuNjcyLTAuODMyICAgYzAuNDY0LTAuMTEyLDAuOTEyLTAuMjMyLDEuMzg0LTAuMzEyQzM3LjEwNCwyMjQuMTc2LDM4LjUyOCwyMjQsNDAsMjI0YzEzLjI1NiwwLDI0LDEwLjc0NCwyNCwyNGMwLDEzLjI1Ni0xMC43NDQsMjQtMjQsMjQgICBjLTEuNTg0LDAtMy4xMi0wLjE2OC00LjYwOC0wLjQ2NGMtMS4wNzItMC4yMDgtMi4wOC0wLjU2OC0zLjA5Ni0wLjkxMmMtMC4zNi0wLjEyOC0wLjc0NC0wLjItMS4wOTYtMC4zNDQgICBjLTEuMzEyLTAuNTItMi41NTItMS4xNjgtMy43MzYtMS45MDRjLTAuMDE2LTAuMDA4LTAuMDMyLTAuMDE2LTAuMDQ4LTAuMDI0Yy0xLjIyNC0wLjc1Mi0yLjM1Mi0xLjYyNC0zLjQxNi0yLjU4NFYzMjBoNDh2LTMySDEyMHogICAiLz4KCTxwYXRoIHN0eWxlPSJmaWxsOiNFNEQ5QjM7IiBkPSJNNzguODcyLDQ0OGgzNC4yNjRoNjEuNzM2SDE4NHYtNDBjMC01LjQ3Mi0wLjU2OC0xMC44MDgtMS41Mi0xNkgxNTJjLTguODQsMC0xNi03LjE2LTE2LTE2ICAgczcuMTYtMTYsMTYtMTZoMTcuNzA0QzE1NCwzMzUuOTM2LDEyNi44OCwzMjAsOTYsMzIwYy00OC42LDAtODgsMzkuNC04OCw4OHY0MGg5LjEyOEg3OC44NzJ6Ii8+CjwvZz4KPGc+Cgk8cGF0aCBzdHlsZT0iZmlsbDojRDQ1QjVCOyIgZD0iTTI3LjQxNiwyNjguMzZjMC4wMTYsMC4wMDgsMC4wMzIsMC4wMTYsMC4wNDgsMC4wMjRjMS4xODQsMC43MzYsMi40MzIsMS4zNzYsMy43MzYsMS45MDQgICBjMC4zNTIsMC4xNDQsMC43MzYsMC4yMTYsMS4wOTYsMC4zNDRjMS4wMDgsMC4zNTIsMi4wMjQsMC42OTYsMy4wOTYsMC45MTJDMzYuODg4LDI3MS44MjQsMzguNDI0LDI3Miw0MCwyNzIgICBjMTMuMjU2LDAsMjQtMTAuNzQ0LDI0LTI0cy0xMC43NDQtMjQtMjQtMjRjLTEuNDcyLDAtMi44OTYsMC4xNzYtNC4yODgsMC40MzJjLTAuNDcyLDAuMDg4LTAuOTI4LDAuMi0xLjM4NCwwLjMxMiAgIGMtMC45MTIsMC4yMjQtMS44LDAuNTA0LTIuNjcyLDAuODMyYy0wLjQ5NiwwLjE4NC0xLDAuMzUyLTEuNDg4LDAuNTc2Yy0xLjEzNiwwLjUxMi0yLjI0LDEuMDk2LTMuMjcyLDEuNzc2aC0wLjAwOGwwLDAgICBDMjAuMzQ0LDIzMi4yMTYsMTYsMjM5LjU5MiwxNiwyNDhjMCw3LjA4LDMuMTIsMTMuMzc2LDgsMTcuNzY4bDAsMEMyNS4wNjQsMjY2LjcyOCwyNi4yMDgsMjY3LjU5MiwyNy40MTYsMjY4LjM2eiIvPgoJPHBhdGggc3R5bGU9ImZpbGw6I0Q0NUI1QjsiIGQ9Ik0zNC4zMjgsMjI0Ljc1MmMwLjQ1Ni0wLjExMiwwLjkyLTAuMjMyLDEuMzg0LTAuMzEyQzM1LjI0LDIyNC41MiwzNC43ODQsMjI0LjYzMiwzNC4zMjgsMjI0Ljc1MnoiLz4KCTxwYXRoIHN0eWxlPSJmaWxsOiNENDVCNUI7IiBkPSJNMzUuMzkyLDI3MS41MzZjLTEuMDY0LTAuMjE2LTIuMDgtMC41Ni0zLjA5Ni0wLjkxMkMzMy4zMTIsMjcwLjk2OCwzNC4zMiwyNzEuMzI4LDM1LjM5MiwyNzEuNTM2eiIvPgoJPHBhdGggc3R5bGU9ImZpbGw6I0Q0NUI1QjsiIGQ9Ik0zMS4yLDI3MC4yOGMtMS4zMDQtMC41MjgtMi41NTItMS4xNi0zLjczNi0xLjkwNEMyOC42NDgsMjY5LjExMiwyOS44ODgsMjY5Ljc2LDMxLjIsMjcwLjI4eiIvPgoJPHBhdGggc3R5bGU9ImZpbGw6I0Q0NUI1QjsiIGQ9Ik0yNCwyNjUuNzY4TDI0LDI2NS43NjhjMS4wNjQsMC45NiwyLjE5MiwxLjgyNCwzLjQxNiwyLjU4NCAgIEMyNi4yMDgsMjY3LjU5MiwyNS4wNjQsMjY2LjcyOCwyNCwyNjUuNzY4eiIvPgoJPHBhdGggc3R5bGU9ImZpbGw6I0Q0NUI1QjsiIGQ9Ik0zMC4xNjgsMjI2LjE1MmMwLjQ4LTAuMjE2LDAuOTg0LTAuMzg0LDEuNDg4LTAuNTc2QzMxLjE1MiwyMjUuNzYsMzAuNjU2LDIyNS45MzYsMzAuMTY4LDIyNi4xNTJ6Ii8+Cgk8cGF0aCBzdHlsZT0iZmlsbDojRDQ1QjVCOyIgZD0iTTI2Ljg5NiwyMjcuOTI4TDI2Ljg5NiwyMjcuOTI4TDI2Ljg5NiwyMjcuOTI4eiIvPgoJPHBhdGggc3R5bGU9ImZpbGw6I0Q0NUI1QjsiIGQ9Ik0xNjUuMTA0LDIyNy45MjhjLTEuMDQtMC42OC0yLjEzNi0xLjI2NC0zLjI3Mi0xLjc3NmMtMC40OC0wLjIxNi0wLjk4NC0wLjM4NC0xLjQ4OC0wLjU3NiAgIGMtMC44NzItMC4zMi0xLjc2LTAuNjA4LTIuNjcyLTAuODMyYy0wLjQ1Ni0wLjExMi0wLjkyLTAuMjMyLTEuMzg0LTAuMzEyQzE1NC44OTYsMjI0LjE3NiwxNTMuNDcyLDIyNCwxNTIsMjI0ICAgYy0xMy4yNTYsMC0yNCwxMC43NDQtMjQsMjRjMCwxMy4yNTYsMTAuNzQ0LDI0LDI0LDI0YzEuNTc2LDAsMy4xMTItMC4xNzYsNC42MDgtMC40NjRjMS4wNjQtMC4yMTYsMi4wOC0wLjU2LDMuMDk2LTAuOTEyICAgYzAuMzYtMC4xMiwwLjc0NC0wLjIsMS4wOTYtMC4zNDRjMS4zMDQtMC41MjgsMi41NTItMS4xNiwzLjczNi0xLjkwNGMwLjAxNi0wLjAwOCwwLjAzMi0wLjAxNiwwLjA0OC0wLjAyNCAgIGMxLjIxNi0wLjc2LDIuMzYtMS42MzIsMy40MTYtMi41ODRsMCwwYzQuODgtNC4zOTIsOC0xMC42ODgsOC0xNy43NjhDMTc2LDIzOS41OTIsMTcxLjY1NiwyMzIuMjE2LDE2NS4xMDQsMjI3LjkyOCAgIEwxNjUuMTA0LDIyNy45MjhMMTY1LjEwNCwyMjcuOTI4eiIvPgoJPHBhdGggc3R5bGU9ImZpbGw6I0Q0NUI1QjsiIGQ9Ik0xNjQuNTM2LDI2OC4zODRjLTEuMTg0LDAuNzM2LTIuNDMyLDEuMzc2LTMuNzM2LDEuOTA0ICAgQzE2Mi4xMTIsMjY5Ljc2LDE2My4zNTIsMjY5LjExMiwxNjQuNTM2LDI2OC4zODR6Ii8+Cgk8cGF0aCBzdHlsZT0iZmlsbDojRDQ1QjVCOyIgZD0iTTE1OS43MDQsMjcwLjYyNGMtMS4wMDgsMC4zNTItMi4wMjQsMC42OTYtMy4wOTYsMC45MTIgICBDMTU3LjY4LDI3MS4zMjgsMTU4LjY4OCwyNzAuOTY4LDE1OS43MDQsMjcwLjYyNHoiLz4KCTxwYXRoIHN0eWxlPSJmaWxsOiNENDVCNUI7IiBkPSJNMTY1LjEwNCwyMjcuOTI4TDE2NS4xMDQsMjI3LjkyOEwxNjUuMTA0LDIyNy45Mjh6Ii8+Cgk8cGF0aCBzdHlsZT0iZmlsbDojRDQ1QjVCOyIgZD0iTTE2MC4zNDQsMjI1LjU3NmMwLjQ5NiwwLjE4NCwxLDAuMzUyLDEuNDg4LDAuNTc2QzE2MS4zNDQsMjI1LjkzNiwxNjAuODQ4LDIyNS43NiwxNjAuMzQ0LDIyNS41NzZ6ICAgIi8+Cgk8cGF0aCBzdHlsZT0iZmlsbDojRDQ1QjVCOyIgZD0iTTE2NC41ODQsMjY4LjM2YzEuMjI0LTAuNzYsMi4zNTItMS42MjQsMy40MTYtMi41ODRsMCwwICAgQzE2Ni45MzYsMjY2LjcyOCwxNjUuNzkyLDI2Ny41OTIsMTY0LjU4NCwyNjguMzZ6Ii8+Cgk8cGF0aCBzdHlsZT0iZmlsbDojRDQ1QjVCOyIgZD0iTTE1Ni4yODgsMjI0LjQzMmMwLjQ3MiwwLjA4OCwwLjkyOCwwLjIsMS4zODQsMC4zMTJDMTU3LjIxNiwyMjQuNjMyLDE1Ni43NiwyMjQuNTIsMTU2LjI4OCwyMjQuNDMyICAgeiIvPgo8L2c+Cjxwb2x5Z29uIHN0eWxlPSJmaWxsOiNFNEQ5QjM7IiBwb2ludHM9IjEyMCwyODggNzIsMjg4IDcyLDMyMCA5NiwzMjAgMTIwLDMyMCAiLz4KPGNpcmNsZSBzdHlsZT0iZmlsbDojRDQ1QjVCOyIgY3g9Ijk2IiBjeT0iMTI4IiByPSIxNiIvPgo8Zz4KCTxwYXRoIHN0eWxlPSJmaWxsOiNFNEQ5QjM7IiBkPSJNNDgsNDcyYzE0Ljg5NiwwLDI3LjI5Ni0xMC4yMjQsMzAuODcyLTI0SDE3LjEyOEMyMC43MDQsNDYxLjc3NiwzMy4xMDQsNDcyLDQ4LDQ3MnoiLz4KCTxwYXRoIHN0eWxlPSJmaWxsOiNFNEQ5QjM7IiBkPSJNMTQ0LDQ3MmMxNC44OTYsMCwyNy4yOTYtMTAuMjI0LDMwLjg3Mi0yNGgtNjEuNzM2QzExNi43MDQsNDYxLjc3NiwxMjkuMTA0LDQ3MiwxNDQsNDcyeiIvPgo8L2c+CjxwYXRoIHN0eWxlPSJmaWxsOiNENDVCNUI7IiBkPSJNMjcyLDE3NmgxNmwxNiwzMmwyNC0zMmgxMjhjOC44NCwwLDE2LTcuMTYsMTYtMTZWMjRjMC04Ljg0LTcuMTYtMTYtMTYtMTZIMjcyICBjLTguODQsMC0xNiw3LjE2LTE2LDE2djMyaC00OGMtOC44NCwwLTE2LDcuMTYtMTYsMTZzNy4xNiwxNiwxNiwxNmg0OHYzMmgtOTZjLTguODQsMC0xNiw3LjE2LTE2LDE2czcuMTYsMTYsMTYsMTZoOTZ2OCAgQzI1NiwxNjguODQsMjYzLjE2LDE3NiwyNzIsMTc2eiBNMzM2LDEwNGgzMkgzMzZ6IE00NDgsNDBIMjgwSDQ0OHogTTQ0OCw3MkgyODBINDQ4eiBNMzIwLDEwNGgtNDBIMzIweiIvPgo8Zz4KCTxwYXRoIHN0eWxlPSJmaWxsOiNCM0Q1RTQ7IiBkPSJNMTM2LDM3NmMwLDguODQsNy4xNiwxNiwxNiwxNmgzMC40OEg0NTZjOC44NCwwLDE2LTcuMTYsMTYtMTZzLTcuMTYtMTYtMTYtMTZoLTQ4SDI2NGgtOTQuMjk2SDE1MiAgIEMxNDMuMTYsMzYwLDEzNiwzNjcuMTYsMTM2LDM3NnoiLz4KCTxwb2x5Z29uIHN0eWxlPSJmaWxsOiNCM0Q1RTQ7IiBwb2ludHM9IjI4OCwyNzIgMzg0LDI3MiAzODQsMzM2IDQwOCwzMzYgNDA4LDI0OCAyNjQsMjQ4IDI2NCwzMzYgMjg4LDMzNiAgIi8+Cgk8cGF0aCBzdHlsZT0iZmlsbDojQjNENUU0OyIgZD0iTTQzMiwzMzZoLTI0aC0yNGgtOTZoLTI0aC0yNGMwLDEzLjI1NiwxMC43NDQsMjQsMjQsMjRoMTQ0QzQyMS4yNTYsMzYwLDQzMiwzNDkuMjU2LDQzMiwzMzZ6Ii8+Cgk8cmVjdCB4PSIyODgiIHk9IjI3MiIgc3R5bGU9ImZpbGw6I0IzRDVFNDsiIHdpZHRoPSI5NiIgaGVpZ2h0PSI2NCIvPgo8L2c+CjxnPgoJPHBhdGggc3R5bGU9ImZpbGw6IzIzMzc0RTsiIGQ9Ik04LDQ1NmgzLjQ4OGM2LjI4LDE0LjM4NCwyMC40OTYsMjQsMzYuNTEyLDI0czMwLjIzMi05LjYxNiwzNi41MTItMjRoMjIuOTg0ICAgYzYuMjgsMTQuMzg0LDIwLjQ4OCwyNCwzNi41MTIsMjRzMzAuMjMyLTkuNjE2LDM2LjUxMi0yNEgxODRjNC40MjQsMCw4LTMuNTg0LDgtOHYtNDBjMC0yLjY0OC0wLjE0NC01LjMwNC0wLjM4NC04SDQ1NiAgIGMxMy4yMzIsMCwyNC0xMC43NjgsMjQtMjRzLTEwLjc2OC0yNC0yNC0yNGgtMjAuNDQ4YzIuNzUyLTQuNzI4LDQuNDQ4LTEwLjE0NCw0LjQ0OC0xNmMwLTQuNDE2LTMuNTc2LTgtOC04aC0xNnYtODAgICBjMC00LjQxNi0zLjU3Ni04LTgtOEgyNjRjLTQuNDI0LDAtOCwzLjU4NC04LDh2ODBoLTE2Yy00LjQyNCwwLTgsMy41ODQtOCw4YzAsNS44NTYsMS42OTYsMTEuMjcyLDQuNDQ4LDE2aC02Mi43NDQgICBjLTYuOTEyLTkuNTg0LTE1LjMzNi0xNy42NjQtMjQuOTA0LTI0SDE2OGM0LjQyNCwwLDgtMy41ODQsOC04di01MS4wNTZjNC45Mi01LjYyNCw4LTEyLjg5Niw4LTIwLjk0NCAgIGMwLTEwLjA3Mi00Ljc2OC0xOC45Ni0xMi4wNjQtMjQuODI0Yy05LjgyNC0zMC4wNTYtMzYuNzc2LTUxLjU0NC02Ny45MzYtNTQuNzJ2LTE3LjkyOGM5LjI4OC0zLjMxMiwxNi0xMi4xMTIsMTYtMjIuNTI4ICAgYzAtMTMuMjMyLTEwLjc2OC0yNC0yNC0yNHMtMjQsMTAuNzY4LTI0LDI0YzAsMTAuNDE2LDYuNzEyLDE5LjIxNiwxNiwyMi41Mjh2MTcuOTI4Yy0zMS4xNjgsMy4xNzYtNTguMTIsMjQuNjY0LTY3LjkzNiw1NC43MiAgIEMxMi43NjgsMjI5LjA0LDgsMjM3LjkyOCw4LDI0OGMwLDguMDQsMy4wOCwxNS4zMTIsOCwyMC45NDRWMzIwYzAsNC40MTYsMy41NzYsOCw4LDhoMTkuMDQ4QzE3LjEzNiwzNDUuMjA4LDAsMzc0LjYzMiwwLDQwOHY0MCAgIEMwLDQ1Mi40MTYsMy41NzYsNDU2LDgsNDU2eiBNNDgsNDY0Yy02Ljk1MiwwLTEzLjM2LTMuMDMyLTE3Ljc4NC04aDM1LjU2QzYxLjM2LDQ2MC45NjgsNTQuOTUyLDQ2NCw0OCw0NjR6IE0xNDQsNDY0ICAgYy02Ljk1MiwwLTEzLjM2LTMuMDMyLTE3Ljc4NC04aDM1LjU2QzE1Ny4zNiw0NjAuOTY4LDE1MC45NTIsNDY0LDE0NCw0NjR6IE00NjQsMzc2YzAsNC40MDgtMy41ODQsOC04LDhIMTgyLjQ4SDE1MiAgIGMtNC40MTYsMC04LTMuNTkyLTgtOHMzLjU4NC04LDgtOGgxNy43MDRIMjY0aDE0NGg0OEM0NjAuNDE2LDM2OCw0NjQsMzcxLjU5Miw0NjQsMzc2eiBNMjcyLDI1NmgxMjh2NzJoLTh2LTU2ICAgYzAtNC40MTYtMy41NzYtOC04LThoLTk2Yy00LjQyNCwwLTgsMy41ODQtOCw4djU2aC04VjI1NnogTTM3NiwzMjhoLTgwdi00OGg4MFYzMjh6IE0yNTAuMTUyLDM0NEgyNjRoMjRoOTZoMjRoMTMuODQ4ICAgYy0yLjc2OCw0Ljc3Ni03LjkzNiw4LTEzLjg0OCw4SDI2NEMyNTguMDg4LDM1MiwyNTIuOTEyLDM0OC43NzYsMjUwLjE1MiwzNDR6IE04MCwzMTJ2LTE2aDMydjE2SDgweiBNMTYyLjY0OCwyNTkuODMyICAgYy0xLjQ4OCwxLjMzNi0zLjE2LDIuMzY4LTQuOTUyLDMuMDcyYy0wLjEyOCwwLjA0OC0wLjI1NiwwLjA3Mi0wLjM4NCwwLjEyYy0wLjc2OCwwLjI4LTEuNTQ0LDAuNTItMi4zMzYsMC42NzIgICBDMTU0LjAwOCwyNjMuODgsMTUzLjAxNiwyNjQsMTUyLDI2NGMtOC44MjQsMC0xNi03LjE3Ni0xNi0xNnM3LjE3Ni0xNiwxNi0xNmMxLjQsMCwyLjc4NCwwLjI0LDQuMTI4LDAuNjA4ICAgYzAuMjg4LDAuMDgsMC41NiwwLjE2OCwwLjg0LDAuMjY0YzEuMzA0LDAuNDMyLDIuNTg0LDAuOTg0LDMuNzYsMS43NTJjMC4wMTYsMC4wMDgsMC4wMzIsMC4wMTYsMC4wNDgsMC4wMjQgICBDMTY1LjEyLDIzNy41MTIsMTY4LDI0Mi40MTYsMTY4LDI0OGMwLDQuNjQ4LTIuMDI0LDguOC01LjIsMTEuNzI4QzE2Mi43NTIsMjU5Ljc2OCwxNjIuNjk2LDI1OS43ODQsMTYyLjY0OCwyNTkuODMyeiBNOTYsMTIwICAgYzQuNDE2LDAsOCwzLjU5Miw4LDhzLTMuNTg0LDgtOCw4cy04LTMuNTkyLTgtOFM5MS41ODQsMTIwLDk2LDEyMHogTTM3LjAyNCwyNjMuNjk2Yy0wLjc5Mi0wLjE2LTEuNTc2LTAuNC0yLjMzNi0wLjY4ICAgYy0wLjEyOC0wLjA0OC0wLjI1Ni0wLjA3Mi0wLjM4NC0wLjEyYy0xLjc4NC0wLjcwNC0zLjQ2NC0xLjc0NC00Ljk1Mi0zLjA3MmMtMC4wNDgtMC4wNC0wLjEwNC0wLjA2NC0wLjE1Mi0wLjEwNCAgIEMyNi4wMjQsMjU2LjgsMjQsMjUyLjY0OCwyNCwyNDhjMC01LjU4NCwyLjg4LTEwLjQ4OCw3LjIyNC0xMy4zNTJjMC4wMTYtMC4wMDgsMC4wMzItMC4wMDgsMC4wNDgtMC4wMjQgICBjMS4xNzYtMC43NjgsMi40NTYtMS4zMiwzLjc2LTEuNzUyYzAuMjgtMC4wODgsMC41NTItMC4xODQsMC44NC0wLjI2NEMzNy4yMTYsMjMyLjI0LDM4LjYsMjMyLDQwLDIzMmM4LjgyNCwwLDE2LDcuMTc2LDE2LDE2ICAgcy03LjE3NiwxNi0xNiwxNkMzOC45ODQsMjY0LDM3Ljk5MiwyNjMuODgsMzcuMDI0LDI2My42OTZ6IE0zMiwyNzguOTY4YzAuMjg4LDAuMDcyLDAuNTg0LDAuMTA0LDAuODcyLDAuMTY4ICAgYzAuNTA0LDAuMTEyLDEuMDA4LDAuMjA4LDEuNTEyLDAuMjk2QzM2LjIzMiwyNzkuNzY4LDM4LjEwNCwyODAsNDAsMjgwYzE3LjY0OCwwLDMyLTE0LjM1MiwzMi0zMmMwLTIuMTkyLTAuMjI0LTQuMzM2LTAuNjQ4LTYuNCAgIGMtMC4xNTItMC43MjgtMC40NDgtMS40LTAuNjQ4LTIuMTEyYy0wLjM2LTEuMzA0LTAuNjgtMi42MjQtMS4yLTMuODU2Yy0wLjM0NC0wLjgyNC0wLjg0OC0xLjU2LTEuMjY0LTIuMzUyICAgYy0wLjUzNi0xLjAzMi0xLjAxNi0yLjA5Ni0xLjY2NC0zLjA1NmMtMC41MjgtMC43OTItMS4yLTEuNDcyLTEuNzkyLTIuMjA4Yy0wLjY4LTAuODQ4LTEuMzA0LTEuNzM2LTIuMDcyLTIuNTEyICAgYy0wLjY4OC0wLjcwNC0xLjQ5Ni0xLjI3Mi0yLjI1Ni0xLjkwNGMtMC44LTAuNjcyLTEuNTUyLTEuNDA4LTIuNDI0LTJjLTAuODI0LTAuNTYtMS43NDQtMC45NzYtMi42MTYtMS40NjQgICBjLTAuOTItMC41MTItMS43OTItMS4wOC0yLjc2LTEuNTA0Yy0wLjkyLTAuNC0xLjkxMi0wLjYzMi0yLjg3Mi0wLjk0NGMtMS4wMjQtMC4zMjgtMi4wMDgtMC43MjgtMy4wNzItMC45NiAgIGMtMC45OTItMC4yMDgtMi4wMzItMC4yNDgtMy4wNDgtMC4zNmMtMS4wMTYtMC4xMi0xLjk5Mi0wLjM0NC0zLjAzMi0wLjM2QzUxLjg4OCwxOTYuNjE2LDcyLjkzNiwxODQsOTYsMTg0ICAgczQ0LjExMiwxMi42MTYsNTUuMzc2LDMyLjAwOGMtMS4wNCwwLjAyNC0yLjAyNCwwLjI0OC0zLjAzMiwwLjM2Yy0xLjAxNiwwLjEyLTIuMDY0LDAuMTUyLTMuMDQ4LDAuMzYgICBjLTEuMDY0LDAuMjI0LTIuMDQ4LDAuNjI0LTMuMDcyLDAuOTUyYy0wLjk2LDAuMzEyLTEuOTYsMC41NDQtMi44OCwwLjk0NGMtMC45NjgsMC40MTYtMS44NCwwLjk5Mi0yLjc1MiwxLjQ5NiAgIGMtMC44OCwwLjQ4OC0xLjgsMC45MDQtMi42MjQsMS40NzJjLTAuODY0LDAuNTkyLTEuNjI0LDEuMzI4LTIuNDI0LDJjLTAuNzUyLDAuNjMyLTEuNTY4LDEuMjA4LTIuMjY0LDEuOTA0ICAgYy0wLjc2LDAuNzY4LTEuMzg0LDEuNjY0LTIuMDcyLDIuNTEyYy0wLjYsMC43MzYtMS4yNjQsMS40MTYtMS43OTIsMi4yMDhjLTAuNjQsMC45NTItMS4xMDQsMi0xLjY0LDMuMDE2ICAgYy0wLjQyNCwwLjgtMC45MjgsMS41NTItMS4yOCwyLjM5MmMtMC41MTIsMS4yMTYtMC44MjQsMi41Mi0xLjE4NCwzLjgwOGMtMC4yLDAuNzI4LTAuNTEyLDEuNDA4LTAuNjY0LDIuMTYgICBDMTIwLjIyNCwyNDMuNjY0LDEyMCwyNDUuODA4LDEyMCwyNDhjMCwxNy42NDgsMTQuMzUyLDMyLDMyLDMyYzEuODk2LDAsMy43NjgtMC4yMzIsNS42MDgtMC41NjggICBjMC41MTItMC4wODgsMS4wMTYtMC4xODQsMS41MTItMC4yOTZjMC4yODgtMC4wNjQsMC41ODQtMC4wOTYsMC44NzItMC4xNjhWMzEyaC0zMnYtMjRjMC00LjQxNi0zLjU3Ni04LTgtOGgtNDggICBjLTQuNDI0LDAtOCwzLjU4NC04LDh2MjRIMzJWMjc4Ljk2OHogTTE2LDQwOGMwLTQ0LjExMiwzNS44ODgtODAsODAtODBjMjEuNzUyLDAsNDIuMTc2LDguNzYsNTcuMDgsMjRIMTUyICAgYy0xMy4yMzIsMC0yNCwxMC43NjgtMjQsMjRzMTAuNzY4LDI0LDI0LDI0aDIzLjU2YzAuMjk2LDIuNzIsMC40NCw1LjM2OCwwLjQ0LDh2MzJoLTEuMTM2aC02MS43MzZINzguODY0SDE3LjEzNkgxNlY0MDh6Ii8+Cgk8cGF0aCBzdHlsZT0iZmlsbDojMjMzNzRFOyIgZD0iTTE2MCwxNjBoODhjMCwxMy4yMzIsMTAuNzY4LDI0LDI0LDI0aDExLjA1NmwxMy43OTIsMjcuNTc2YzEuMjQsMi40OCwzLjY4LDQuMTQ0LDYuNDQsNC4zOTIgICBjMC4yMzIsMC4wMjQsMC40OCwwLjAzMiwwLjcxMiwwLjAzMmMyLjUwNCwwLDQuODgtMS4xNzYsNi40LTMuMkwzMzIsMTg0aDEyNGMxMy4yMzIsMCwyNC0xMC43NjgsMjQtMjRWMjQgICBjMC0xMy4yMzItMTAuNzY4LTI0LTI0LTI0SDI3MmMtMTMuMjMyLDAtMjQsMTAuNzY4LTI0LDI0djI0aC00MGMtMTMuMjMyLDAtMjQsMTAuNzY4LTI0LDI0czEwLjc2OCwyNCwyNCwyNGg0MHYxNmgtODggICBjLTEzLjIzMiwwLTI0LDEwLjc2OC0yNCwyNFMxNDYuNzY4LDE2MCwxNjAsMTYweiBNMTYwLDEyOGg5NmM0LjQyNCwwLDgtMy41ODQsOC04Vjg4YzAtNC40MTYtMy41NzYtOC04LThoLTQ4ICAgYy00LjQxNiwwLTgtMy41OTItOC04czMuNTg0LTgsOC04aDQ4YzQuNDI0LDAsOC0zLjU4NCw4LThWMjRjMC00LjQwOCwzLjU4NC04LDgtOGgxODRjNC40MTYsMCw4LDMuNTkyLDgsOHYxMzYgICBjMCw0LjQwOC0zLjU4NCw4LTgsOEgzMjhjLTIuNTEyLDAtNC44ODgsMS4xODQtNi40LDMuMmwtMTYuMjMyLDIxLjY0OGwtMTAuMjA4LTIwLjQyNEMyOTMuOCwxNjkuNzEyLDI5MS4wMzIsMTY4LDI4OCwxNjhoLTE2ICAgYy00LjQxNiwwLTgtMy41OTItOC04di04YzAtNC40MTYtMy41NzYtOC04LThoLTk2Yy00LjQxNiwwLTgtMy41OTItOC04UzE1NS41ODQsMTI4LDE2MCwxMjh6Ii8+Cgk8cmVjdCB4PSIyODAiIHk9IjMyIiBzdHlsZT0iZmlsbDojMjMzNzRFOyIgd2lkdGg9IjE2OCIgaGVpZ2h0PSIxNiIvPgoJPHJlY3QgeD0iMjgwIiB5PSI2NCIgc3R5bGU9ImZpbGw6IzIzMzc0RTsiIHdpZHRoPSIxNjgiIGhlaWdodD0iMTYiLz4KCTxyZWN0IHg9IjI4MCIgeT0iOTYiIHN0eWxlPSJmaWxsOiMyMzM3NEU7IiB3aWR0aD0iNDAiIGhlaWdodD0iMTYiLz4KCTxyZWN0IHg9IjMzNiIgeT0iOTYiIHN0eWxlPSJmaWxsOiMyMzM3NEU7IiB3aWR0aD0iMzIiIGhlaWdodD0iMTYiLz4KCTxwYXRoIHN0eWxlPSJmaWxsOiMyMzM3NEU7IiBkPSJNOTAuOTQ0LDg3LjMzNmwxNS41NDQsMy43NzZjMS4wNzItNC40LDIuNTA0LTguNzc2LDQuMjcyLTEzLjAxNkw5Niw3MS45MjggICBDOTMuOTA0LDc2LjkzNiw5Mi4yMDgsODIuMTIsOTAuOTQ0LDg3LjMzNnoiLz4KCTxwYXRoIHN0eWxlPSJmaWxsOiMyMzM3NEU7IiBkPSJNMTI1LjEwNCw1NC44MjRsLTEyLjE2LTEwLjRjLTMuNTEyLDQuMTEyLTYuNzM2LDguNTEyLTkuNTQ0LDEzLjA4OGwxMy42MjQsOC4zOTIgICBDMTE5LjQwOCw2Mi4wMzIsMTIyLjEyOCw1OC4zMDQsMTI1LjEwNCw1NC44MjR6Ii8+Cgk8cGF0aCBzdHlsZT0iZmlsbDojMjMzNzRFOyIgZD0iTTE0NS44OCwzNy4wNGwtOC4zOTItMTMuNjI0Yy00LjU4NCwyLjgyNC04Ljk5Miw2LjAzMi0xMy4wODgsOS41NDRsMTAuNDA4LDEyLjE2ICAgQzEzOC4yNzIsNDIuMTQ0LDE0MiwzOS40MjQsMTQ1Ljg4LDM3LjA0eiIvPgoJPHBhdGggc3R5bGU9ImZpbGw6IzIzMzc0RTsiIGQ9Ik0xNjcuMjk2LDEwLjk1MmMtNS4yNDgsMS4yOC0xMC40MzIsMi45ODQtMTUuNCw1LjA1Nmw2LjE2OCwxNC43NjggICBjNC4xOTItMS43Niw4LjU3Ni0zLjIsMTMuMDI0LTQuMjg4TDE2Ny4yOTYsMTAuOTUyeiIvPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+Cjwvc3ZnPgo=" />
                BORT</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        This is a nice message inside the card         
                    </div>
                    <div class="col-12" style="align-items: end;">
                        This is a nice message inside the card    
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="input-group">
                    <input type="text" class="form-control" name="usrMsg">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-info btn-sm" id="sendMsg">
                            <i class="fas fa-location-arrow"></i>
                        </button>
                    </div>
                </div>
            </div>
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">End Conversation</button>
            </div> -->
            
        </div>
    </div>
</div>

    <div class="jumbotron">

        <div class="row">
            <div class="col-4">
                <img class="rounded img-thumbnail" src="<?php echo $user->image_filename; ?>" />
            </div>
            <div class="col-8">
                <h4 class="display-6">About Me...</h4>
                <hr class="my-4" />
                <h2 class="display-4"><?php echo $user->name; ?></h4>
                <p class="lead text-center"><b>A</b> Software Developer, DJ</p>
                <hr class="my-4" />
                <h4>My Skills...</h4>
                <hr class="my-4" />
                <div class="row">
                    <div class="col-2 text-center">
                        <i class="fab fa-html5 fa-3x"></i>
                        
                    </div>
                    <div class="col-2 text-center">
                        <i class="fab fa-css3-alt fa-3x"></i>
                        
                    </div>
                    <div class="col-2 text-center">
                        <i class="fab fa-js fa-3x"></i>
                    </div>
                    <div class="col-2 text-center">
                        <i class="fab fa-php fa-3x"></i>
                    </div>
                    <div class="col-2 text-center">
                        <i class="fab fa-laravel fa-3x"></i>
                    </div>
                    <div class="col-2 text-center text-center">
                        <i class="fas fa-database fa-3x"></i><br>
                        SQL
                    </div>
                </div>
                <hr class="my-4" />
                <h4>Talk to me...</h4>
                <hr class="my-4" />
                <div class="row">
                    <div class="col-1">
                        <a href="https://fb.me/adewumi.mhideh" target="_blank">
                            <i class="fab fa-facebook fa-2x" style="color: #3b5999"></i>
                        </a>
                    </div>
                    <div class="col-1">
                        <a href="https://twitter.com/codergab" target="_blank">
                            <i class="fab fa-twitter fa-2x" style="color: #55acee"></i>
                        </a>
                    </div>
                    <div class="col-1">
                        <a href="https://github.com/codergab" target="_blank">
                            <i class="fab fa-github fa-2x" style="color: #34465d"></i>
                        </a>
                    </div>
                    <div class="col-9">
                        <span class="lead">OR</span>
                        <button class="btn btn-primary ml-3" data-toggle="modal" data-target="#bot">Talk to my BORT</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <script>
            var documentHead = document.querySelector('title');
            documentHead.innerHTML = "Adewumi Gabriel's Profile";
        </script>
   </body>
   </html>
<link rel="stylesheet" href="https://fontawesome.com/v4.7.0/assets/font-awesome/css/font-awesome.css">


