<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E - Parking</title>

    <style>
        :root {
            --asm-default-transition: 300ms;
            --asm-color-facebook: rgb(59, 89, 152);
            --asm-color-twitter: rgb(85, 172, 238);
            --asm-color-google: rgb(219, 68, 55);
            --asm-color-linkedin: rgb(0, 130, 202);
        }

        :root {
            --asm-color-warning: #ffc107;
            --asm-color-danger: #dc3545;
            --asm-color-dark: #343a40;
            --asm-color-focus: rgba(0, 123, 255, 0.25);
            --asm-color-secondary: #3f5c80;
            --asm-color-accent: #b4c2c9;
            --asm-color-flat: #6a9ed3;
            --asm-color-sidenav-item: rgba(29, 54, 86, .6);
            --asm-color-input-border: rgba(52, 58, 64, .25);
            --asm-color-btn-secondary: #64c3f0;
            --asm-color-background: #fff;
            --asm-color-text: #343a40;
            --asm-color-secondary-text: #fff;
            --asm-color-social: #fff;
        }

        *,
        *::before,
        *::after {
            margin: 0;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            -webkit-transition: var(--asm-default-transition);
            transition: var(--asm-default-transition);
        }

        body {
            padding-top: 1rem;
            font-family: sans-serif;
            background-color: #f0f0f0;
        }

        .asm-form {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
            width: 90%;
            max-width: 30rem;
            margin: 0 auto;
            font-family: inherit;
            border-radius: 0.5rem;
            -webkit-box-shadow: 0 0 0.8rem rgba(0, 0, 0, 0.15);
            box-shadow: 0 0 0.8rem rgba(0, 0, 0, 0.15);
            color: var(--asm-color-text);
            background-color: var(--asm-color-background);
            font-size: .8rem;
        }

        .asm-form:not(.active) {
            max-height: 0;
            overflow: hidden;
        }

        .asm-form__body {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
            padding: 0.75rem 2rem;
            font-family: inherit;
            color: var(--asm-color-text);
            background-color: var(--asm-color-background);
        }

        .asm-form__footer,
        .asm-form__header {
            padding: 0.75rem 2rem;
            color: var(--asm-color-secondary-text);
            background-color: var(--asm-color-secondary);
        }

        .asm-form__footer {
            border-radius: 0 0 .5rem .5rem;
        }

        .asm-form__header {
            border-radius: .5rem .5rem 0 0;
        }

        .asm-form__social-networks {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
        }

        .asm-form__social-btn {
            position: relative;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            width: 2rem;
            height: 2rem;
            margin: .5rem 0;
            background-color: var(--btn-bg-color);
            border: none;
            border-radius: 50%;
            -webkit-box-shadow: 0 5px 11px 0 rgba(0, 0, 0, 0.18), 0 4px 15px 0 rgba(0, 0, 0, 0.15);
            box-shadow: 0 5px 11px 0 rgba(0, 0, 0, 0.18), 0 4px 15px 0 rgba(0, 0, 0, 0.15);
            cursor: pointer;
        }

        .asm-form__social-btn:hover {
            -webkit-box-shadow: 0 8px 17px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            box-shadow: 0 8px 17px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }

        .asm-form__social-btn:not(:first-child) {
            margin-left: 1rem;
        }

        .asm-form__social-btn.facebook {
            --btn-bg-color: var(--asm-color-facebook);
        }

        .asm-form__social-btn.twitter {
            --btn-bg-color: var(--asm-color-twitter);
        }

        .asm-form__social-btn.google {
            --btn-bg-color: var(--asm-color-google);
        }

        .asm-form__social-btn.linkedin {
            --btn-bg-color: var(--asm-color-linkedin);
        }

        .asm-form__social-icon {
            height: 1.25rem;
        }

        .asm-form__social-icon .inner {
            fill: var(--asm-color-social);
        }

        .asm-form__inputbox,
        .asm-form__leverbox {
            position: relative;
            margin: 0.5rem 0;
            --error-opacity: 0;
            --error-top: -3rem;
            --error-z-index: -1;
            --input-box-shadow: none;
        }

        .asm-form__inputbox.invalid,
        .asm-form__leverbox.invalid {
            --error-opacity: 1;
            --error-top: 100%;
            --error-z-index: 10;
            --input-box-shadow: inset 0 0 4px var(--asm-color-warning);
        }

        .asm-form__icon {
            position: absolute;
            top: 50%;
            max-width: 1rem;
            color: inherit;
            -webkit-transform: translateY(-50%);
            transform: translateY(-50%);
        }

        .asm-form__icon.prepend {
            left: 1rem;
        }

        .asm-form__icon.append {
            right: 1rem;
        }

        .asm-form__inputlabel {
            position: absolute;
            top: 50%;
            left: 0;
            font-family: inherit;
            color: inherit;
            -webkit-transition: var(--asm-default-transition);
            transition: var(--asm-default-transition);
            -webkit-transform: translate(3rem, -50%);
            transform: translate(3rem, -50%);
        }

        .asm-form__inputlabel:not(.active) {
            font-size: 1.25em;
        }

        .asm-form__inputlabel.active {
            top: 0;
            font-size: 1em;
            -webkit-transform: translate(1rem, -100%);
            transform: translate(1rem, -100%);
            color: var(--asm-color-text);
            text-transform: capitalize;
        }

        .asm-form__error {
            position: absolute;
            width: -webkit-fit-content;
            width: -moz-fit-content;
            width: fit-content;
            padding: .5rem 1rem;
            z-index: var(--error-z-index);
            top: var(--error-top);
            left: 3rem;
            color: var(--asm-color-warning);
            background: var(--asm-color-danger);
            border-radius: 0.5rem;
            opacity: var(--error-opacity);
        }

        .asm-form__error::before {
            position: absolute;
            left: 1rem;
            top: -1rem;
            z-index: -1;
            content: '';
            width: .5rem;
            height: .5rem;
            display: block;
            border-width: .5rem;
            border-top-color: transparent;
            border-right-color: transparent;
            border-bottom-color: var(--asm-color-danger);
            border-left-color: transparent;
            border-style: solid;
        }

        .asm-form__input {
            width: 100%;
            padding: 0.75rem 3rem;
            font-family: inherit;
            font-size: 1.25em;
            color: inherit;
            background-color: inherit;
            border: 1px solid var(--asm-color-input-border);
            border-radius: .3rem;
            -webkit-box-shadow: var(--input-box-shadow);
            box-shadow: var(--input-box-shadow);
        }

        .asm-form__input::-webkit-input-placeholder {
            color: transparent;
        }

        .asm-form__input:-ms-input-placeholder {
            color: transparent;
        }

        .asm-form__input::-ms-input-placeholder {
            color: transparent;
        }

        .asm-form__input::placeholder {
            color: transparent;
        }

        .asm-form__input:active,
        .asm-form__input:focus,
        .asm-form__input:hover {
            outline: none;
            -webkit-box-shadow: inset 0 0 4px var(--asm-color-sidenav-item);
            box-shadow: inset 0 0 4px var(--asm-color-sidenav-item);
        }

        .asm-form__leverbox {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
        }

        @media (min-width: 576px) {
            .asm-form__leverbox {
                -webkit-box-orient: horizontal;
                -webkit-box-direction: normal;
                -ms-flex-direction: row;
                flex-direction: row;
                -webkit-box-pack: justify;
                -ms-flex-pack: justify;
                justify-content: space-between;
                padding: 0 2rem;
            }
        }

        .asm-form__leverlabel {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            cursor: pointer;
        }

        @media (max-width: 575px) {
            .asm-form__leverlabel {
                margin-bottom: 1rem;
            }
        }

        .asm-form__lever {
            position: relative;
            -moz-appearance: none;
            appearance: none;
            -webkit-appearance: none;
            width: 2rem;
            height: 1rem;
            margin-right: 1rem;
            background-color: var(--background);
            border: 1px solid var(--asm-color-secondary);
            border-radius: 1rem;
            outline: none;
            -webkit-transition: var(--asm-default-transition);
            transition: var(--asm-default-transition);
            cursor: pointer;
            --background: transparent;
            --ball-background: var(--asm-color-secondary);
            --ball-left: 0.15rem;
        }

        .asm-form__lever:checked {
            --background: var(--asm-color-secondary);
            --ball-background: #fff;
            --ball-left: calc(100% - .85rem);
        }

        .asm-form__lever:focus {
            -webkit-box-shadow: 0 0 0 0.2rem var(--asm-color-focus);
            box-shadow: 0 0 0 0.2rem var(--asm-color-focus);
        }

        .asm-form__lever::before {
            position: absolute;
            top: 50%;
            left: var(--ball-left);
            display: block;
            width: 0.75rem;
            height: 0.75rem;
            content: '';
            -webkit-transition: var(--asm-default-transition);
            transition: var(--asm-default-transition);
            -webkit-transform: translateY(-50%);
            transform: translateY(-50%);
            background: var(--ball-background);
            border-radius: 50%;
        }

        .asm-form__linkbox {
            text-align: right;
        }

        .asm-form__link {
            text-decoration: none;
            border: none;
            background-color: transparent;
            cursor: pointer;
            color: var(--asm-color-flat);
            font-size: 1em;
        }

        .asm-form__link:hover {
            color: var(--asm-color-accent);
        }

        .asm-form__btn {
            width: 100%;
            padding: 0.75rem;
            border: none;
            border-radius: 0.3rem;
            text-transform: uppercase;
            cursor: pointer;
            font-family: inherit;
            font-size: 1.2em;
            color: var(--asm-color-dark);
            background: var(--asm-color-btn-secondary);
            -webkit-box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
            box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
        }

        .asm-form__btn:hover {
            -webkit-box-shadow: 0 5px 11px 0 rgba(0, 0, 0, 0.18), 0 4px 15px 0 rgba(0, 0, 0, 0.15);
            box-shadow: 0 5px 11px 0 rgba(0, 0, 0, 0.18), 0 4px 15px 0 rgba(0, 0, 0, 0.15);
        }
    </style>
</head>

<body>
    <form action="#" class="asm-form active" id="frmSignIn" novalidate onsubmit="return validateForm(this)">
        <div class="asm-form__header">
            <h2>Sign In</h2>
        </div>
        <div class="asm-form__body">
            <!-- <div class="asm-form__social-networks">
                <button class="asm-form__social-btn facebook" data-action="social-login" data-network="facebook"
                    type="button">
                    <svg class="asm-form__social-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                        <path class="inner"
                            d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z" />
                    </svg>
                </button>
                <button class="asm-form__social-btn twitter" data-action="social-login" data-network="twitter"
                    type="button">
                    <svg class="asm-form__social-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path class="inner"
                            d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z" />
                    </svg>
                </button>
                <button class="asm-form__social-btn google" data-action="social-login" data-network="google"
                    type="button">
                    <svg class="asm-form__social-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 488 512">
                        <path class="inner"
                            d="M488 261.8C488 403.3 391.1 504 248 504 110.8 504 0 393.2 0 256S110.8 8 248 8c66.8 0 123 24.5 166.3 64.9l-67.5 64.9C258.5 52.6 94.3 116.6 94.3 256c0 86.5 69.1 156.6 153.7 156.6 98.2 0 135-70.4 140.8-106.9H248v-85.3h236.1c2.3 12.7 3.9 24.9 3.9 41.4z" />
                    </svg>
                </button>
                <button class="asm-form__social-btn linkedin" data-action="social-login" data-network="linkedin"
                    type="button">
                    <svg class="asm-form__social-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                        <path class="inner"
                            d="M100.28 448H7.4V148.9h92.88zM53.79 108.1C24.09 108.1 0 83.5 0 53.8a53.79 53.79 0 0 1 107.58 0c0 29.7-24.1 54.3-53.79 54.3zM447.9 448h-92.68V302.4c0-34.7-.7-79.2-48.29-79.2-48.29 0-55.69 37.7-55.69 76.7V448h-92.78V148.9h89.08v40.8h1.3c12.4-23.5 42.69-48.3 87.88-48.3 94 0 111.28 61.9 111.28 142.3V448z" />
                    </svg>
                </button>
            </div> -->
            <div class="asm-form__inputbox">
                <svg class="asm-form__icon prepend" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                    <path
                        d="M313.6 304c-28.7 0-42.5 16-89.6 16-47.1 0-60.8-16-89.6-16C60.2 304 0 364.2 0 438.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-25.6c0-74.2-60.2-134.4-134.4-134.4zM400 464H48v-25.6c0-47.6 38.8-86.4 86.4-86.4 14.6 0 38.3 16 89.6 16 51.7 0 74.9-16 89.6-16 47.6 0 86.4 38.8 86.4 86.4V464zM224 288c79.5 0 144-64.5 144-144S303.5 0 224 0 80 64.5 80 144s64.5 144 144 144zm0-240c52.9 0 96 43.1 96 96s-43.1 96-96 96-96-43.1-96-96 43.1-96 96-96z" />
                </svg>
                
                <label class="asm-form__inputlabel" for="signinUsername"></label>
                <input class="asm-form__input validate" data-validation="regex" data-regex="^[a-z0-9]{6,20}$"
                    type="text" name="username" id="signinUsername" required placeholder="Username">
                <div class="asm-form__error">Username must be [6,20] symbols and contain only small letters and numbers
                </div>
            </div>
            <div class="asm-form__inputbox">
                <svg class="asm-form__icon prepend" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path
                        d="M320 48c79.529 0 144 64.471 144 144s-64.471 144-144 144c-18.968 0-37.076-3.675-53.66-10.339L224 368h-32v48h-48v48H48v-96l134.177-134.177A143.96 143.96 0 0 1 176 192c0-79.529 64.471-144 144-144m0-48C213.965 0 128 85.954 128 192c0 8.832.602 17.623 1.799 26.318L7.029 341.088A24.005 24.005 0 0 0 0 358.059V488c0 13.255 10.745 24 24 24h144c13.255 0 24-10.745 24-24v-24h24c13.255 0 24-10.745 24-24v-20l40.049-40.167C293.106 382.604 306.461 384 320 384c106.035 0 192-85.954 192-192C512 85.965 426.046 0 320 0zm0 144c0 26.51 21.49 48 48 48s48-21.49 48-48-21.49-48-48-48-48 21.49-48 48z" />
                </svg>
                <input class="asm-form__input validate" data-validation="regex" data-regex=".{6,}" type="password"
                    name="password" id="signinPassword" required placeholder="password">
                <label class="asm-form__inputlabel" for="signinPassword">password</label>
                <svg class="asm-form__icon append" data-action="toggle-show-password" data-input="#signinPassword"
                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                    <path
                        d="M288 144a110.94 110.94 0 0 0-31.24 5 55.4 55.4 0 0 1 7.24 27 56 56 0 0 1-56 56 55.4 55.4 0 0 1-27-7.24A111.71 111.71 0 1 0 288 144zm284.52 97.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400c-98.65 0-189.09-55-237.93-144C98.91 167 189.34 112 288 112s189.09 55 237.93 144C477.1 345 386.66 400 288 400z" />
                </svg>
                <div class="asm-form__error">Password must be more than 6 symbols</div>
            </div>
            <div class="asm-form__leverbox">
                <label class="asm-form__leverlabel">
                    <input class="asm-form__lever" type="checkbox" name="remember" id="signinRemember">
                    <span class="asm-form__lever-text">Remember me</span>
                </label>
                <button type="button" class="asm-form__link" data-action="show-form" data-target="#frmForget">Forgot
                    password</button>
            </div>
            <div class="asm-form__linkbox">
                Not a member? <button type="button" class="asm-form__link" data-action="show-form"
                    data-target="#frmRegister">Register</button>
            </div>
        </div>

        <div class="asm-form__footer">
            <button class="asm-form__btn" id="signinSubmit">Sign In</button>
        </div>
    </form>

    <form action="#" class="asm-form" id="frmForget" novalidate onsubmit="return validateForm(this)">
        <div class="asm-form__header">
            <h2>Forget Password</h2>
        </div>
        <div class="asm-form__body">
            <div class="asm-form__linkbox">
                <button type="button" class="asm-form__link" data-action="show-form" data-target="#frmSignIn">Sign
                    in</button>
            </div>
            <div class="asm-form__inputbox">
                <svg class="asm-form__icon prepend" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path
                        d="M464 64H48C21.49 64 0 85.49 0 112v288c0 26.51 21.49 48 48 48h416c26.51 0 48-21.49 48-48V112c0-26.51-21.49-48-48-48zm0 48v40.805c-22.422 18.259-58.168 46.651-134.587 106.49-16.841 13.247-50.201 45.072-73.413 44.701-23.208.375-56.579-31.459-73.413-44.701C106.18 199.465 70.425 171.067 48 152.805V112h416zM48 400V214.398c22.914 18.251 55.409 43.862 104.938 82.646 21.857 17.205 60.134 55.186 103.062 54.955 42.717.231 80.509-37.199 103.053-54.947 49.528-38.783 82.032-64.401 104.947-82.653V400H48z" />
                </svg>
                <input class="asm-form__input validate" data-validation="regex" data-regex="\S+@\S+\.\S+" type="email"
                    name="email" id="forgetEmail" required placeholder="email">
                <label class="asm-form__inputlabel" for="forgetEmail">email</label>
                <div class="asm-form__error">Invalid Email</div>
            </div>
            <div class="asm-form__linkbox">
                Not a member? <button type="button" class="asm-form__link" data-action="show-form"
                    data-target="#frmRegister">Register</button>
            </div>
        </div>

        <div class="asm-form__footer">
            <button class="asm-form__btn" id="forgetSubmit">Send</button>
        </div>
    </form>

    <form action="#" class="asm-form" id="frmRegister" novalidate onsubmit="return validateForm(this)">
        <div class="asm-form__header">
            <h2>Register</h2>
        </div>
        <div class="asm-form__body">
            <div class="asm-form__linkbox">
                Already member? <button type="button" class="asm-form__link" data-action="show-form"
                    data-target="#frmSignIn">Sign in</button>
            </div>
            <div class="asm-form__social-networks">
                <button class="asm-form__social-btn facebook" data-action="social-login" data-network="facebook"
                    type="button">
                    <svg class="asm-form__social-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                        <path class="inner"
                            d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z" />
                    </svg>
                </button>
                <button class="asm-form__social-btn twitter" data-action="social-login" data-network="twitter"
                    type="button">
                    <svg class="asm-form__social-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path class="inner"
                            d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z" />
                    </svg>
                </button>
                <button class="asm-form__social-btn google" data-action="social-login" data-network="google"
                    type="button">
                    <svg class="asm-form__social-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 488 512">
                        <path class="inner"
                            d="M488 261.8C488 403.3 391.1 504 248 504 110.8 504 0 393.2 0 256S110.8 8 248 8c66.8 0 123 24.5 166.3 64.9l-67.5 64.9C258.5 52.6 94.3 116.6 94.3 256c0 86.5 69.1 156.6 153.7 156.6 98.2 0 135-70.4 140.8-106.9H248v-85.3h236.1c2.3 12.7 3.9 24.9 3.9 41.4z" />
                    </svg>
                </button>
                <button class="asm-form__social-btn linkedin" data-action="social-login" data-network="linkedin"
                    type="button">
                    <svg class="asm-form__social-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                        <path class="inner"
                            d="M100.28 448H7.4V148.9h92.88zM53.79 108.1C24.09 108.1 0 83.5 0 53.8a53.79 53.79 0 0 1 107.58 0c0 29.7-24.1 54.3-53.79 54.3zM447.9 448h-92.68V302.4c0-34.7-.7-79.2-48.29-79.2-48.29 0-55.69 37.7-55.69 76.7V448h-92.78V148.9h89.08v40.8h1.3c12.4-23.5 42.69-48.3 87.88-48.3 94 0 111.28 61.9 111.28 142.3V448z" />
                    </svg>
                </button>
            </div>
            <div class="asm-form__inputbox">
                <svg class="asm-form__icon prepend" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                    <path
                        d="M313.6 304c-28.7 0-42.5 16-89.6 16-47.1 0-60.8-16-89.6-16C60.2 304 0 364.2 0 438.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-25.6c0-74.2-60.2-134.4-134.4-134.4zM400 464H48v-25.6c0-47.6 38.8-86.4 86.4-86.4 14.6 0 38.3 16 89.6 16 51.7 0 74.9-16 89.6-16 47.6 0 86.4 38.8 86.4 86.4V464zM224 288c79.5 0 144-64.5 144-144S303.5 0 224 0 80 64.5 80 144s64.5 144 144 144zm0-240c52.9 0 96 43.1 96 96s-43.1 96-96 96-96-43.1-96-96 43.1-96 96-96z" />
                </svg>
                <input class="asm-form__input validate" data-validation="regex" data-regex="^[a-z0-9]{6,20}$"
                    type="text" name="username" id="registerUsername" required placeholder="username">
                <label class="asm-form__inputlabel" for="registerUsername">username</label>
                <div class="asm-form__error">Username must be [6,20] symbols and contain only small letters and numbers
                </div>
            </div>
            <div class="asm-form__inputbox">
                <svg class="asm-form__icon prepend" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path
                        d="M464 64H48C21.49 64 0 85.49 0 112v288c0 26.51 21.49 48 48 48h416c26.51 0 48-21.49 48-48V112c0-26.51-21.49-48-48-48zm0 48v40.805c-22.422 18.259-58.168 46.651-134.587 106.49-16.841 13.247-50.201 45.072-73.413 44.701-23.208.375-56.579-31.459-73.413-44.701C106.18 199.465 70.425 171.067 48 152.805V112h416zM48 400V214.398c22.914 18.251 55.409 43.862 104.938 82.646 21.857 17.205 60.134 55.186 103.062 54.955 42.717.231 80.509-37.199 103.053-54.947 49.528-38.783 82.032-64.401 104.947-82.653V400H48z" />
                </svg>
                <input class="asm-form__input validate" data-validation="regex" data-regex="\S+@\S+\.\S+" type="email"
                    name="email" id="registerEmail" required placeholder="email">
                <label class="asm-form__inputlabel" for="registerEmail">email</label>
                <div class="asm-form__error">Invalid Email</div>
            </div>
            <div class="asm-form__inputbox">
                <svg class="asm-form__icon prepend" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path
                        d="M476.5 22.9L382.3 1.2c-21.6-5-43.6 6.2-52.3 26.6l-43.5 101.5c-8 18.6-2.6 40.6 13.1 53.4l40 32.7C311 267.8 267.8 311 215.4 339.5l-32.7-40c-12.8-15.7-34.8-21.1-53.4-13.1L27.7 329.9c-20.4 8.7-31.5 30.7-26.6 52.3l21.7 94.2c4.8 20.9 23.2 35.5 44.6 35.5C312.3 512 512 313.7 512 67.5c0-21.4-14.6-39.8-35.5-44.6zM69.3 464l-20.9-90.7 98.2-42.1 55.7 68.1c98.8-46.4 150.6-98 197-197l-68.1-55.7 42.1-98.2L464 69.3C463 286.9 286.9 463 69.3 464z" />
                </svg>
                <input class="asm-form__input validate" data-validation="regex" data-regex="^[+]{1}[0-9]{9,12}"
                    type="tel" name="phone" id="registerPhone" required placeholder="phone">
                <label class="asm-form__inputlabel" for="registerPhone">phone</label>
                <div class="asm-form__error">Please enter phone in valid international format +XXXXXXXXXXXX</div>
            </div>
            <div class="asm-form__inputbox">
                <svg class="asm-form__icon prepend" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path
                        d="M320 48c79.529 0 144 64.471 144 144s-64.471 144-144 144c-18.968 0-37.076-3.675-53.66-10.339L224 368h-32v48h-48v48H48v-96l134.177-134.177A143.96 143.96 0 0 1 176 192c0-79.529 64.471-144 144-144m0-48C213.965 0 128 85.954 128 192c0 8.832.602 17.623 1.799 26.318L7.029 341.088A24.005 24.005 0 0 0 0 358.059V488c0 13.255 10.745 24 24 24h144c13.255 0 24-10.745 24-24v-24h24c13.255 0 24-10.745 24-24v-20l40.049-40.167C293.106 382.604 306.461 384 320 384c106.035 0 192-85.954 192-192C512 85.965 426.046 0 320 0zm0 144c0 26.51 21.49 48 48 48s48-21.49 48-48-21.49-48-48-48-48 21.49-48 48z" />
                </svg>
                <input class="asm-form__input validate" data-validation="regex" data-regex=".{6,}" type="password"
                    name="password" id="registerPassword" required placeholder="password">
                <label class="asm-form__inputlabel" for="registerPassword">password</label>
                <svg class="asm-form__icon append" data-action="toggle-show-password" data-input="#registerPassword"
                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                    <path
                        d="M288 144a110.94 110.94 0 0 0-31.24 5 55.4 55.4 0 0 1 7.24 27 56 56 0 0 1-56 56 55.4 55.4 0 0 1-27-7.24A111.71 111.71 0 1 0 288 144zm284.52 97.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400c-98.65 0-189.09-55-237.93-144C98.91 167 189.34 112 288 112s189.09 55 237.93 144C477.1 345 386.66 400 288 400z" />
                </svg>
                <div class="asm-form__error">Password must be more than 6 symbols</div>
            </div>
            <div class="asm-form__inputbox">
                <svg class="asm-form__icon prepend" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path
                        d="M320 48c79.529 0 144 64.471 144 144s-64.471 144-144 144c-18.968 0-37.076-3.675-53.66-10.339L224 368h-32v48h-48v48H48v-96l134.177-134.177A143.96 143.96 0 0 1 176 192c0-79.529 64.471-144 144-144m0-48C213.965 0 128 85.954 128 192c0 8.832.602 17.623 1.799 26.318L7.029 341.088A24.005 24.005 0 0 0 0 358.059V488c0 13.255 10.745 24 24 24h144c13.255 0 24-10.745 24-24v-24h24c13.255 0 24-10.745 24-24v-20l40.049-40.167C293.106 382.604 306.461 384 320 384c106.035 0 192-85.954 192-192C512 85.965 426.046 0 320 0zm0 144c0 26.51 21.49 48 48 48s48-21.49 48-48-21.49-48-48-48-48 21.49-48 48z" />
                </svg>
                <input class="asm-form__input validate" data-validation="match" data-target="#registerPassword"
                    type="password" name="password" id="registerPasswordRetry" required placeholder="repeat password">
                <label class="asm-form__inputlabel" for="registerPasswordRetry">repeat password</label>
                <svg class="asm-form__icon append" data-action="toggle-show-password"
                    data-input="#registerPasswordRetry" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                    <path
                        d="M288 144a110.94 110.94 0 0 0-31.24 5 55.4 55.4 0 0 1 7.24 27 56 56 0 0 1-56 56 55.4 55.4 0 0 1-27-7.24A111.71 111.71 0 1 0 288 144zm284.52 97.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400c-98.65 0-189.09-55-237.93-144C98.91 167 189.34 112 288 112s189.09 55 237.93 144C477.1 345 386.66 400 288 400z" />
                </svg>
                <div class="asm-form__error">Passwords are mismatch</div>
            </div>
            <div class="asm-form__textbox">
                <span>By clicking register you agree to our <a href="./eula.html" class="asm-form__link"
                        target="_blank">terms of service</a></span>
            </div>
        </div>

        <div class="asm-form__footer">
            <button class="asm-form__btn" id="registerSubmit">Register</button>
        </div>
</body>

</html>