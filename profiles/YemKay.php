<?php 
  try {
      $sql = "SELECT secret_word FROM secret_word";
      $q = $conn->query($sql);
      $q->setFetchMode(PDO::FETCH_ASSOC);
      $data = $q->fetch();
      $secret_word = $data['secret_word'];
  } catch (PDOException $e) {
      throw $e;
  }
?>


<style type="text/css">
html, body, div, span, applet, object, iframe, h1, h2, h3, h4, h5, h6, p, blockquote,
pre, a, abbr, acronym, address, big, cite, code, del, dfn, em, img, ins, kbd,
q, s, samp, small, strike, strong, sub, sup, tt, var, b, u, i, center, dl, dt,
dd, ol, ul, li, fieldset, form, label, legend, table, caption, tbody, tfoot,
thead, tr, th, td, article, aside, canvas, details, embed, figure, figcaption,
footer, header, hgroup, menu, nav, output, ruby, section, summary, time,
mark, audio, video {
  margin: 0;
  padding: 0;
  border: 0;
  font: inherit;
  font-size: 100%;
  vertical-align: baseline
}

body {
  line-height: 1
}

ol, ul {
  list-style: none
}

table {
  border-collapse: collapse;
  border-spacing: 0
}

caption, th, td {
  text-align: left;
  font-weight: normal;
  vertical-align: middle
}

q, blockquote {
  quotes: none
}

q:before, q:after, blockquote:before, blockquote:after {
  content: "";
  content: none
}

a img {
  border: none
}

article, aside, details, figcaption, figure, footer, header, hgroup,
menu, nav, section, summary {
  display: block
}

input[data-ime-mode-disabled], input[type=file] {
  ime-mode: disabled !important
}

/*! normalize.css v2.1.2 | MIT License | git.io/normalize */
html {
  font-family: sans-serif;
  -ms-text-size-adjust: 100%;
  -webkit-text-size-adjust: 100%
}

a:focus {
  outline: thin dotted
}

a:active, a:hover {
  outline: 0
}

code, kbd, pre, samp {
  font-family: monospace, serif;
  font-size: 1em
}

pre {
  white-space: pre;
  white-space: pre-wrap;
  word-wrap: break-word
}

small {
  font-size: 80%
}

sub, sup {
  font-size: 75%;
  line-height: 0;
  position: relative;
  vertical-align: baseline
}

sup {
  top: -0.5em
}

sub {
  bottom: -0.25em
}

img {
  border: 0
}

form {
  margin: 0
}

legend {
  border: 0;
  padding: 0;
  white-space: normal
}

button, input, select, textarea {
  font-family: inherit;
  font-size: 100%;
  margin: 0;
  vertical-align: baseline
}

button, input {
  line-height: normal
}

button, select {
  text-transform: none
}

button, html input[type="button"], input[type="reset"], input[type="submit"] {
  -webkit-appearance: button;
  cursor: pointer
}

button[disabled], html input[disabled] {
  cursor: default
}

input[type="checkbox"], input[type="radio"] {
  box-sizing: border-box;
  padding: 0
}

input[type="search"] {
  -webkit-appearance: textfield;
  -moz-box-sizing: content-box;
  -webkit-box-sizing: content-box;
  box-sizing: content-box
}

input[type="search"]::-webkit-search-cancel-button, input[type="search"]::-webkit-search-decoration {
  -webkit-appearance: none
}

button::-moz-focus-inner, input::-moz-focus-inner {
  border: 0;
  padding: 0
}

textarea {
  overflow: auto;
  vertical-align: top
}

fieldset {
  border: 1px solid #c0c0c0;
  margin: 0 2px;
  padding: 0.35em 0.625em 0.75em
}

@font-face {
  font-family: "LinkedIn-Glyphs";
  src: url('https://www.linkedin.com/sc/h/tuuxr9ztnncz39kcj6y6n8hl');
  src: url('https://www.linkedin.com/sc/h/tuuxr9ztnncz39kcj6y6n8hl?#iefix') format('embedded-opentype'), url('https://www.linkedin.com/sc/h/5hjaxnktppouly0ggy7fbhqup') format('woff'), url('https://www.linkedin.com/sc/h/29azlglm8id6xo8f810q7w5s0') format('truetype');
  font-weight: normal;
  font-style: normal
}

@font-face {
  font-family: "LinkedIn-Glyphs-2.0.7";
  src: url('https://www.linkedin.com/sc/h/tuuxr9ztnncz39kcj6y6n8hl');
  src: url('https://www.linkedin.com/sc/h/tuuxr9ztnncz39kcj6y6n8hl?#iefix') format('embedded-opentype'), url('https://www.linkedin.com/sc/h/5hjaxnktppouly0ggy7fbhqup') format('woff'), url('https://www.linkedin.com/sc/h/29azlglm8id6xo8f810q7w5s0') format('truetype');
  font-weight: normal;
  font-style: normal
}

@-webkit-keyframes archetype-loader {
  from {
    -webkit-transform: rotate(0deg)
  }

  to {
    -webkit-transform: rotate(360deg)
  }
}

@-moz-keyframes archetype-loader {
  from {
    -moz-transform: rotate(0deg)
  }

  to {
    -moz-transform: rotate(360deg)
  }
}

@-ms-keyframes archetype-loader {
  from {
    -ms-transform: rotate(0deg)
  }

  to {
    -ms-transform: rotate(360deg)
  }
}

@-o-keyframes archetype-loader {
  from {
    -o-transform: rotate(0deg)
  }

  to {
    -o-transform: rotate(360deg)
  }
}

@keyframes archetype-loader {
  from {
    transform: rotate(0deg)
  }

  to {
    transform: rotate(360deg)
  }
}

@-webkit-keyframes archetype-loader-position-medium-1 {
  from, to {
    background-position: 0 -288px;
    width: 58px;
    height: 58px;
    margin-left: -29px;
    margin-top: -29px
  }
}

@-moz-keyframes archetype-loader-position-medium-1 {
  from, to {
    background-position: 0 -288px;
    width: 58px;
    height: 58px;
    margin-left: -29px;
    margin-top: -29px
  }
}

@-ms-keyframes archetype-loader-position-medium-1 {
  from, to {
    background-position: 0 -288px;
    width: 58px;
    height: 58px;
    margin-left: -29px;
    margin-top: -29px
  }
}

@-o-keyframes archetype-loader-position-medium-1 {
  from, to {
    background-position: 0 -288px;
    width: 58px;
    height: 58px;
    margin-left: -29px;
    margin-top: -29px
  }
}

@keyframes archetype-loader-position-medium-1 {
  from, to {
    background-position: 0 -288px;
    width: 58px;
    height: 58px;
    margin-left: -29px;
    margin-top: -29px
  }
}

@-webkit-keyframes archetype-loader-position-medium-2 {
  from, to {
    background-position: 0 -230px;
    width: 58px;
    height: 58px;
    margin-left: -29px;
    margin-top: -29px
  }
}

@-moz-keyframes archetype-loader-position-medium-2 {
  from, to {
    background-position: 0 -230px;
    width: 58px;
    height: 58px;
    margin-left: -29px;
    margin-top: -29px
  }
}

@-ms-keyframes archetype-loader-position-medium-2 {
  from, to {
    background-position: 0 -230px;
    width: 58px;
    height: 58px;
    margin-left: -29px;
    margin-top: -29px
  }
}

@-o-keyframes archetype-loader-position-medium-2 {
  from, to {
    background-position: 0 -230px;
    width: 58px;
    height: 58px;
    margin-left: -29px;
    margin-top: -29px
  }
}

@keyframes archetype-loader-position-medium-2 {
  from, to {
    background-position: 0 -230px;
    width: 58px;
    height: 58px;
    margin-left: -29px;
    margin-top: -29px
  }
}

@-webkit-keyframes archetype-loader-position-small-1 {
  from, to {
    background-position: 0 -362px;
    width: 16px;
    height: 16px;
    margin-left: -8px;
    margin-top: -8px
  }
}

@-moz-keyframes archetype-loader-position-small-1 {
  from, to {
    background-position: 0 -362px;
    width: 16px;
    height: 16px;
    margin-left: -8px;
    margin-top: -8px
  }
}

@-ms-keyframes archetype-loader-position-small-1 {
  from, to {
    background-position: 0 -362px;
    width: 16px;
    height: 16px;
    margin-left: -8px;
    margin-top: -8px
  }
}

@-o-keyframes archetype-loader-position-small-1 {
  from, to {
    background-position: 0 -362px;
    width: 16px;
    height: 16px;
    margin-left: -8px;
    margin-top: -8px
  }
}

@keyframes archetype-loader-position-small-1 {
  from, to {
    background-position: 0 -362px;
    width: 16px;
    height: 16px;
    margin-left: -8px;
    margin-top: -8px
  }
}

@-webkit-keyframes archetype-loader-position-small-2 {
  from, to {
    background-position: 0 -346px;
    width: 16px;
    height: 16px;
    margin-left: -8px;
    margin-top: -8px
  }
}

@-moz-keyframes archetype-loader-position-small-2 {
  from, to {
    background-position: 0 -346px;
    width: 16px;
    height: 16px;
    margin-left: -8px;
    margin-top: -8px
  }
}

@-ms-keyframes archetype-loader-position-small-2 {
  from, to {
    background-position: 0 -346px;
    width: 16px;
    height: 16px;
    margin-left: -8px;
    margin-top: -8px
  }
}

@-o-keyframes archetype-loader-position-small-2 {
  from, to {
    background-position: 0 -346px;
    width: 16px;
    height: 16px;
    margin-left: -8px;
    margin-top: -8px
  }
}

@keyframes archetype-loader-position-small-2 {
  from, to {
    background-position: 0 -346px;
    width: 16px;
    height: 16px;
    margin-left: -8px;
    margin-top: -8px
  }
}

@-webkit-keyframes archetype-loader-position-large-1 {
  from, to {
    background-position: 0 -115px;
    width: 115px;
    height: 115px;
    margin-left: -57.5px;
    margin-top: -57.5px
  }
}

@-moz-keyframes archetype-loader-position-large-1 {
  from, to {
    background-position: 0 -115px;
    width: 115px;
    height: 115px;
    margin-left: -57.5px;
    margin-top: -57.5px
  }
}

@-ms-keyframes archetype-loader-position-large-1 {
  from, to {
    background-position: 0 -115px;
    width: 115px;
    height: 115px;
    margin-left: -57.5px;
    margin-top: -57.5px
  }
}

@-o-keyframes archetype-loader-position-large-1 {
  from, to {
    background-position: 0 -115px;
    width: 115px;
    height: 115px;
    margin-left: -57.5px;
    margin-top: -57.5px
  }
}

@keyframes archetype-loader-position-large-1 {
  from, to {
    background-position: 0 -115px;
    width: 115px;
    height: 115px;
    margin-left: -57.5px;
    margin-top: -57.5px
  }
}

@-webkit-keyframes archetype-loader-position-large-2 {
  from, to {
    background-position: 0 0;
    width: 115px;
    height: 115px;
    margin-left: -57.5px;
    margin-top: -57.5px
  }
}

@-moz-keyframes archetype-loader-position-large-2 {
  from, to {
    background-position: 0 0;
    width: 115px;
    height: 115px;
    margin-left: -57.5px;
    margin-top: -57.5px
  }
}

@-ms-keyframes archetype-loader-position-large-2 {
  from, to {
    background-position: 0 0;
    width: 115px;
    height: 115px;
    margin-left: -57.5px;
    margin-top: -57.5px
  }
}

@-o-keyframes archetype-loader-position-large-2 {
  from, to {
    background-position: 0 0;
    width: 115px;
    height: 115px;
    margin-left: -57.5px;
    margin-top: -57.5px
  }
}

@keyframes archetype-loader-position-large-2 {
  from, to {
    background-position: 0 0;
    width: 115px;
    height: 115px;
    margin-left: -57.5px;
    margin-top: -57.5px
  }
}

body {
  background: #e9e9e9 url('https://www.linkedin.com/sc/h/ews8a0ws38v3rc0r1x892x0sj')
}

body, button, input, textarea {
  font-family: sans-serif
}

.os-win body, .os-win button, .os-win input, .os-win textarea {
  font-family: Arial, sans-serif
}

.os-mac body, .os-mac button, .os-mac input, .os-mac textarea {
  font-family: Helvetica, Arial, sans-serif
}

.os-linux body, .os-linux button, .os-linux input, .os-linux textarea {
  font-family: Helvetica, FreeSans, "Liberation Sans", Helmet, Arial, sans-serif
}

#wrapper {
  margin-left: auto;
  margin-right: auto;
  width: 974px;
  background: #e9e9e9 url('https://www.linkedin.com/sc/h/ews8a0ws38v3rc0r1x892x0sj')
}

a {
  color: #006fa6;
  text-decoration: none
}

a.hover, a:hover, a.focus, a:focus {
  text-decoration: underline
}

a.visited, a:visited {
  color: #96999c
}

span.error {
  font-weight: bold;
  color: #900
}

div.alert {
  margin-bottom: 15px
}

div.alert, div.alert.error {
  background-color: #c9342f;
  background-repeat: no-repeat;
  background: -webkit-linear-gradient(top, #dd5959 0%, #c15252 100%);
  background: -moz-linear-gradient(top, #dd5959 0%, #c15252 100%);
  background: -o-linear-gradient(top, #dd5959 0%, #c15252 100%);
  background: linear-gradient(top, #dd5959 0%, #c15252 100%);
  -webkit-box-shadow: 0 0 0 1px #c15252, 0 1px 2px rgba(0, 0, 0, 0.45);
  -moz-box-shadow: 0 0 0 1px #c15252, 0 1px 2px rgba(0, 0, 0, 0.45);
  box-shadow: 0 0 0 1px #c15252, 0 1px 2px rgba(0, 0, 0, 0.45);
  overflow: hidden;
  display: block;
  color: #fff;
  font-size: 15px;
  line-height: 20px;
  position: relative;
  padding: 10px 20px 10px 50px
}

div.alert:before, div.alert.error:before {
  font-family: "LinkedIn-Glyphs-2.0.7", "LinkedIn-Glyphs";
  font-weight: normal;
  font-style: normal;
  text-decoration: inherit;
  speak: none;
  font-size: 26px;
  color: inherit;
  content: "\e001"
}

div.alert:before, div.alert.error:before {
  position: absolute;
  top: 7px;
  left: 12px;
  line-height: 1
}

div.alert strong {
  font-weight: normal
}

div.alert strong.strong, div.alert b {
  font-weight: bold
}

div.alert p {
  margin: 0;
  font-size: 100%
}

div.alert p + p {
  margin-top: 5px
}

div.alert img {
  display: none
}

div.alert a {
  color: #fff;
  text-decoration: none;
  font-weight: bold
}

div.alert a.hover, div.alert a:hover, div.alert a.focus, div.alert a:focus {
  text-decoration: underline
}

div.alert:hover a {
  text-decoration: underline
}

div.alert ul {
  margin: 0 21px 5px 7px
}

div.alert .dismiss, div.alert #notice-close {
  color: #fff;
  background: transparent none;
  padding: 0 1px 0 0;
  border: 0;
  margin: 0;
  cursor: pointer;
  text-decoration: none;
  position: absolute;
  overflow: hidden;
  top: 10px;
  right: 10px;
  width: 13px;
  height: 13px;
  text-indent: 14px;
  padding: 0
}

div.alert .dismiss:before, div.alert #notice-close:before {
  font-family: "LinkedIn-Glyphs-2.0.7", "LinkedIn-Glyphs";
  font-weight: normal;
  font-style: normal;
  text-decoration: inherit;
  speak: none;
  font-size: 13px;
  color: inherit;
  content: "\e00f"
}

div.alert .dismiss:before, div.alert #notice-close:before {
  vertical-align: top;
  line-height: 1;
  position: absolute;
  top: 0;
  right: 0;
  text-decoration: none;
  cursor: pointer
}

div.alert .dismiss.hover, div.alert .dismiss:hover, div.alert .dismiss.focus,
div.alert .dismiss:focus, div.alert #notice-close.hover, div.alert #notice-close:hover,
div.alert #notice-close.focus, div.alert #notice-close:focus {
  text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.35)
}

div.alert.attention, div.alert.warning {
  background-color: #d1711b;
  background-repeat: no-repeat;
  background: -webkit-linear-gradient(top, #e8a02d 0%, #c08d2d 100%);
  background: -moz-linear-gradient(top, #e8a02d 0%, #c08d2d 100%);
  background: -o-linear-gradient(top, #e8a02d 0%, #c08d2d 100%);
  background: linear-gradient(top, #e8a02d 0%, #c08d2d 100%);
  -webkit-box-shadow: 0 0 0 1px #cb8e2d, 0 1px 2px rgba(0, 0, 0, 0.45);
  -moz-box-shadow: 0 0 0 1px #cb8e2d, 0 1px 2px rgba(0, 0, 0, 0.45);
  box-shadow: 0 0 0 1px #cb8e2d, 0 1px 2px rgba(0, 0, 0, 0.45);
  overflow: hidden;
  display: block;
  color: #fff;
  font-size: 15px;
  line-height: 20px;
  position: relative;
  padding: 10px 20px 10px 50px
}

div.alert.attention:before, div.alert.warning:before {
  font-family: "LinkedIn-Glyphs-2.0.7", "LinkedIn-Glyphs";
  font-weight: normal;
  font-style: normal;
  text-decoration: inherit;
  speak: none;
  font-size: 26px;
  color: inherit;
  content: "\e003"
}

div.alert.attention:before, div.alert.warning:before {
  position: absolute;
  top: 7px;
  left: 12px;
  line-height: 1
}

div.alert.success {
  background-color: #5b912d;
  background-repeat: no-repeat;
  background: -webkit-linear-gradient(top, #63ae55 0%, #5a994e 100%);
  background: -moz-linear-gradient(top, #63ae55 0%, #5a994e 100%);
  background: -o-linear-gradient(top, #63ae55 0%, #5a994e 100%);
  background: linear-gradient(top, #63ae55 0%, #5a994e 100%);
  -webkit-box-shadow: 0 0 0 1px #5b9b4e, 0 1px 2px rgba(0, 0, 0, 0.45);
  -moz-box-shadow: 0 0 0 1px #5b9b4e, 0 1px 2px rgba(0, 0, 0, 0.45);
  box-shadow: 0 0 0 1px #5b9b4e, 0 1px 2px rgba(0, 0, 0, 0.45);
  overflow: hidden;
  display: block;
  color: #fff;
  font-size: 15px;
  line-height: 20px;
  position: relative;
  padding: 10px 20px 10px 50px
}

div.alert.success:before {
  font-family: "LinkedIn-Glyphs-2.0.7", "LinkedIn-Glyphs";
  font-weight: normal;
  font-style: normal;
  text-decoration: inherit;
  speak: none;
  font-size: 26px;
  color: inherit;
  content: "\e000"
}

div.alert.success:before {
  position: absolute;
  top: 7px;
  left: 12px;
  line-height: 1
}

div.alert.notice {
  background-color: #737577;
  background-repeat: no-repeat;
  background: -webkit-linear-gradient(top, #929292 0%, #828282 100%);
  background: -moz-linear-gradient(top, #929292 0%, #828282 100%);
  background: -o-linear-gradient(top, #929292 0%, #828282 100%);
  background: linear-gradient(top, #929292 0%, #828282 100%);
  -webkit-box-shadow: 0 0 0 1px #7e7e7e, 0 1px 2px rgba(0, 0, 0, 0.45);
  -moz-box-shadow: 0 0 0 1px #7e7e7e, 0 1px 2px rgba(0, 0, 0, 0.45);
  box-shadow: 0 0 0 1px #7e7e7e, 0 1px 2px rgba(0, 0, 0, 0.45);
  overflow: hidden;
  display: block;
  color: #fff;
  font-size: 15px;
  line-height: 20px;
  position: relative;
  padding: 10px 20px 10px 50px
}

div.alert.notice:before {
  font-family: "LinkedIn-Glyphs-2.0.7", "LinkedIn-Glyphs";
  font-weight: normal;
  font-style: normal;
  text-decoration: inherit;
  speak: none;
  font-size: 26px;
  color: inherit;
  content: "\e002"
}

div.alert.notice:before {
  position: absolute;
  top: 7px;
  left: 12px;
  line-height: 1
}

body, #wrapper {
  background: #dfdfdf
}

.hide {
  display: none
}

#wrapper {
  margin-top: 38px;
  word-wrap: break-word;
  word-break: break-word
}

#wrapper:after {
  content: "\0020";
  display: block;
  height: 0;
  clear: both;
  overflow: hidden;
  visibility: hidden
}

#profile {
  float: left;
  width: 646px
}

#aux {
  margin-left: 10px;
  float: left;
  width: 318px
}

.lazy-load, .lazy-loaded {
  -webkit-transition: opacity 0.3s;
  -moz-transition: opacity 0.3s;
  -o-transition: opacity 0.3s;
  transition: opacity 0.3s;
  opacity: 0
}

.lazy-loaded {
  opacity: 1
}

.screen-reader-text {
  height: 0;
  overflow: hidden;
  text-indent: 101%;
  white-space: nowrap;
  width: 0;
  display: block;
  margin: 0;
  padding: 0;
  position: absolute
}

[data-href] {
  cursor: pointer
}

.profile-section {
  background: #fff;
  -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, 0.15), -1px 0 0 rgba(0, 0, 0, 0.03), 1px 0 0 rgba(0, 0, 0, 0.03), 0 1px 0 rgba(0, 0, 0, 0.12);
  -moz-box-shadow: 0 1px 1px rgba(0, 0, 0, 0.15), -1px 0 0 rgba(0, 0, 0, 0.03), 1px 0 0 rgba(0, 0, 0, 0.03), 0 1px 0 rgba(0, 0, 0, 0.12);
  box-shadow: 0 1px 1px rgba(0, 0, 0, 0.15), -1px 0 0 rgba(0, 0, 0, 0.03), 1px 0 0 rgba(0, 0, 0, 0.03), 0 1px 0 rgba(0, 0, 0, 0.12);
  margin-bottom: 10px
}

.ie.lte8 .profile-section {
  border-bottom: 2px solid #ccc
}

.profile-section .title {
  font-size: 16px;
  font-weight: normal;
  line-height: 18px;
  color: #434649;
  padding: 30px 35px 0
}

.profile-section .item-title, .profile-section .item-subtitle {
  margin-bottom: 5px
}

.profile-section .item-title {
  font-size: 16px;
  font-weight: bold;
  line-height: 18px;
  color: #000
}

.profile-section .item-title a {
  font-size: 16px;
  font-weight: bold;
  line-height: 18px;
  color: #000;
  text-decoration: none;
  position: relative;
  display: inline-block
}

.profile-section .item-title a.hover, .profile-section .item-title a:hover,
.profile-section .item-title a.focus, .profile-section .item-title a:focus {
  text-decoration: none;
  color: #006fa6;
  cursor: pointer
}

.ie .profile-section .item-title a.hover, .ie .profile-section .item-title a:hover,
.ie .profile-section .item-title a.focus, .ie .profile-section .item-title a:focus {
  cursor: hand
}

.profile-section .item-title a:visited {
  font-size: 16px;
  font-weight: bold;
  line-height: 18px;
  color: #000;
  text-decoration: none
}

.profile-section .item-title a:visited.hover, .profile-section .item-title a:visited:hover,
.profile-section .item-title a:visited.focus, .profile-section .item-title a:visited:focus {
  text-decoration: none;
  color: #006fa6;
  cursor: pointer
}

.ie .profile-section .item-title a:visited.hover, .ie .profile-section .item-title a:visited:hover,
.ie .profile-section .item-title a:visited.focus, .ie .profile-section .item-title a:visited:focus {
  cursor: hand
}

.profile-section .item-subtitle {
  font-size: 14px;
  font-weight: normal;
  line-height: 16px;
  color: #434649
}

.profile-section .item-subtitle a {
  font-size: 14px;
  font-weight: normal;
  line-height: 16px;
  color: #434649;
  text-decoration: none
}

.profile-section .item-subtitle a.hover, .profile-section .item-subtitle a:hover,
.profile-section .item-subtitle a.focus, .profile-section .item-subtitle a:focus {
  text-decoration: none;
  color: #006fa6;
  cursor: pointer
}

.ie .profile-section .item-subtitle a.hover, .ie .profile-section .item-subtitle a:hover,
.ie .profile-section .item-subtitle a.focus, .ie .profile-section .item-subtitle a:focus {
  cursor: hand
}

.profile-section .item-subtitle a:visited {
  font-size: 14px;
  font-weight: normal;
  line-height: 16px;
  color: #434649;
  text-decoration: none
}

.profile-section .item-subtitle a:visited.hover, .profile-section .item-subtitle a:visited:hover,
.profile-section .item-subtitle a:visited.focus, .profile-section .item-subtitle a:visited:focus {
  text-decoration: none;
  color: #006fa6;
  cursor: pointer
}

.ie .profile-section .item-subtitle a:visited.hover, .ie .profile-section .item-subtitle a:visited:hover,
.ie .profile-section .item-subtitle a:visited.focus, .ie .profile-section .item-subtitle a:visited:focus {
  cursor: hand
}

.profile-section > ul > li {
  overflow: hidden;
  padding: 30px 35px;
  border-bottom: 1px solid #ddd
}

.profile-section > ul > li:last-child {
  border: 0
}

.profile-section .pills {
  padding: 30px 35px
}

.profile-section .pills li {
  -webkit-box-shadow: 0 1px 1px #ccc;
  -moz-box-shadow: 0 1px 1px #ccc;
  box-shadow: 0 1px 1px #ccc;
  -webkit-transition: all 0.07s;
  -moz-transition: all 0.07s;
  -o-transition: all 0.07s;
  transition: all 0.07s;
  display: inline-block;
  border: 0;
  margin: 0 5px 5px 0;
  padding: 0;
  font-size: 13px;
  line-height: 17px;
  color: #333333;
  font-weight: normal;
  background: #f1f1f1;
  border-radius: 2px;
  text-decoration: none
}

.profile-section .pills li a {
  color: #333;
  display: inline-block;
  border-radius: 2px
}

.profile-section .pills li:hover a {
  color: #fff;
  background-color: #0077b5;
  text-decoration: none
}

.profile-section .pills li .wrap {
  display: inline-block;
  padding: 5px 10px 4px
}

.profile-section .pills li.extra {
  display: none
}

.profile-section .pills .see-more:hover .wrap, .profile-section .pills .see-less:hover .wrap {
  color: #fff
}

.profile-section .see-more .wrap, .profile-section .see-less .wrap {
  color: #006fa6;
  cursor: pointer
}

.profile-section .expander-state-checkbox {
  display: none
}

.profile-section .expander-state-checkbox:checked ~ .see-more {
  display: none
}

.profile-section .expander-state-checkbox:checked ~ .extra {
  display: inline-block
}

.profile-section header .meta {
  font-size: 13px;
  line-height: 17px;
  color: #333;
  font-weight: normal
}

.profile-section .meta {
  font-size: 12px;
  line-height: 14px;
  color: #66696a
}

.profile-section .meta span ~ span {
  margin-left: 5px;
  border-left: 1px solid #bbb;
  padding-left: 5px
}

.profile-section .description {
  font-size: 13px;
  line-height: 17px;
  color: #333;
  font-weight: normal;
  margin-top: 15px
}

.profile-section .logo {
  float: right;
  width: 60px;
  text-align: center
}

.profile-section .logo img {
  max-width: 60px;
  max-height: 60px
}

.profile-section .external-link:after {
  font-family: "LinkedIn-Glyphs-2.0.7", "LinkedIn-Glyphs";
  font-weight: normal;
  font-style: normal;
  text-decoration: inherit;
  speak: none;
  font-size: 14px;
  color: inherit;
  content: "\e029"
}

.profile-section .external-link:after {
  padding-left: 5px;
  vertical-align: middle;
  position: absolute
}

.profile-section .contributors {
  padding-top: 5px
}

.profile-section .contributors dt {
  font-size: 13px;
  line-height: 17px;
  color: #66696a;
  display: inline-block;
  padding-right: 5px
}

.profile-section .contributors dd {
  display: inline-block
}

.profile-section .contributors .contributor {
  display: inline-block;
  font-size: 13px;
  line-height: 17px;
  color: #66696a;
  padding-right: 5px
}

.profile-section .contributors .contributor a {
  font-size: 13px;
  line-height: 17px;
  color: #66696a;
  text-decoration: none
}

.profile-section .contributors .contributor a.hover, .profile-section .contributors .contributor a:hover,
.profile-section .contributors .contributor a.focus, .profile-section .contributors .contributor a:focus {
  text-decoration: none;
  color: #006fa6;
  cursor: pointer
}

.ie .profile-section .contributors .contributor a.hover, .ie .profile-section .contributors .contributor a:hover,
.ie .profile-section .contributors .contributor a.focus, .ie .profile-section .contributors .contributor a:focus {
  cursor: hand
}

.profinder__cta, #join-balloon .pane .pane-body form.reg-form button.join-btn,
.services-modal .submit, #join-balloon .pane .pane-body form.login-form button.sign-in,
#join-balloon #login-pane .alt-action .join-btn, #join-balloon .pane button,
#join-balloon .pane a.button {
  box-sizing: border-box;
  border-radius: 2px;
  cursor: pointer;
  text-align: center;
  transition-duration: 167ms;
  transition-property: background-color, box-shadow, color;
  transition-timing-function: cubic-bezier(0, 0, 0.2, 1)
}

.profinder__cta, #join-balloon .pane .pane-body form.reg-form button.join-btn,
.services-modal .submit {
  background-color: #008cc9;
  border: 0;
  color: white
}

.profinder__cta:hover, #join-balloon .pane .pane-body form.reg-form button.join-btn:hover,
.services-modal .submit:hover {
  background-color: #0077b5
}

.profinder__cta:disabled, #join-balloon .pane .pane-body form.reg-form button.join-btn:disabled,
.services-modal .submit:disabled {
  color: rgba(255, 255, 255, 0.7);
  opacity: 0.25
}

#join-balloon .pane .pane-body form.login-form button.sign-in {
  background-color: transparent;
  border: 0;
  box-shadow: inset 0 0 0 1px #008cc9, inset 0 0 0 2px transparent, inset 0 0 0 3px transparent;
  color: #00a0dc
}

#join-balloon .pane .pane-body form.login-form button.sign-in:hover {
  background-color: rgba(0, 119, 181, 0.1);
  color: #0077b5;
  box-shadow: inset 0 0 0 1px #008cc9, inset 0 0 0 2px #0077b5, inset 0 0 0 3px transparent
}

#join-balloon #login-pane .alt-action .join-btn {
  background-color: white;
  border: 0;
  color: rgba(0, 0, 0, 0.7)
}

#join-balloon #login-pane .alt-action .join-btn:hover {
  background-color: rgba(255, 255, 255, 0.85);
  color: black
}

.hovercard[aria-hidden="true"], [aria-hidden="true"].profinder__hovercard {
  opacity: 0;
  transition: visibility 0s linear .2s, opacity .2s linear;
  visibility: hidden
}

.hovercard[aria-hidden="false"], [aria-hidden="false"].profinder__hovercard {
  opacity: 1;
  transition-delay: 0s;
  visibility: visible
}

.hovercard[data-position="right"], [data-position="right"].profinder__hovercard {
  left: 35px;
  top: 50%;
  transform: translateY(-50%)
}

.hovercard[data-position="right"]:before, [data-position="right"].profinder__hovercard:before {
  border-color: transparent;
  border-style: solid;
  border-width: 9px 0;
  border-right: 9px rgba(0, 0, 0, 0.1) solid;
  content: "";
  height: 0;
  width: 0;
  left: -10px;
  top: 50%;
  margin-top: -10px;
  position: absolute
}

.hovercard[data-position="right"]:after, [data-position="right"].profinder__hovercard:after {
  border-color: transparent;
  border-style: solid;
  border-width: 8px 0;
  border-right: 8px #fff solid;
  content: "";
  height: 0;
  width: 0;
  left: -8px;
  top: 50%;
  margin-top: -9px;
  position: absolute
}

.hovercard[data-position="top"], [data-position="top"].profinder__hovercard {
  left: 50%;
  bottom: 32px;
  margin-left: 3px;
  transform: translateX(-50%)
}

.hovercard[data-position="top"]:before, [data-position="top"].profinder__hovercard:before {
  border-color: transparent;
  border-style: solid;
  border-width: 0 9px;
  border-top: 9px rgba(0, 0, 0, 0.1) solid;
  content: "";
  height: 0;
  width: 0;
  bottom: -10px;
  left: 50%;
  margin-left: -10px;
  position: absolute
}

.hovercard[data-position="top"]:after, [data-position="top"].profinder__hovercard:after {
  border-color: transparent;
  border-style: solid;
  border-width: 0 8px;
  border-top: 8px #fff solid;
  content: "";
  height: 0;
  width: 0;
  bottom: -8px;
  left: 50%;
  margin-left: -9px;
  position: absolute
}

.hovercard, .profinder__hovercard {
  position: absolute;
  min-width: 200px;
  line-height: 20px;
  font-weight: 400;
  color: rgba(0, 0, 0, 0.7);
  font-size: 15px;
  background-color: #fff;
  border-radius: 2px;
  padding: 14px 16px;
  z-index: 999;
  box-shadow: 0 0 0 1px rgba(0, 0, 0, 0.1), 0 6px 9px rgba(0, 0, 0, 0.2);
  background-clip: padding-box
}

#topcard {
  padding: 0
}

#topcard .profile-card {
  overflow: hidden;
  position: relative
}

#topcard .profile-picture {
  float: left;
  width: 200px;
  height: 200px;
  text-align: center;
  margin: 20px 0
}

#topcard .profile-picture a {
  display: block
}

#topcard .profile-picture img {
  vertical-align: middle;
  -webkit-box-shadow: 0 0 5px 0 rgba(0, 0, 0, 0.1), 0 0 0 1px #f4f4f4;
  -moz-box-shadow: 0 0 5px 0 rgba(0, 0, 0, 0.1), 0 0 0 1px #f4f4f4;
  box-shadow: 0 0 5px 0 rgba(0, 0, 0, 0.1), 0 0 0 1px #f4f4f4
}

#topcard .profile-overview {
  float: right;
  width: 405px;
  padding: 0 20px 20px
}

#topcard .profile-overview-content {
  padding: 20px 70px 15px 0
}

#topcard .profile-overview-content.is-influencer {
  padding-right: 90px
}

#topcard .hide ~ .profile-overview {
  float: none;
  width: auto;
  padding-left: 40px;
  padding-right: 40px
}

#topcard #name {
  font-size: 26px;
  font-weight: bold;
  line-height: 30px;
  color: #000
}

#topcard .headline {
  padding: 1px 0;
  font-size: 16px;
  line-height: 20px;
  color: #333;
  font-weight: normal
}

#topcard #demographics dt {
  display: none
}

#topcard #demographics .descriptor {
  display: inline-block;
  font-size: 13px;
  line-height: 17px;
  color: #66696a
}

#topcard #demographics .descriptor ~ .descriptor {
  border-left: 1px solid #bbb;
  padding-left: 8px;
  margin-left: 5px
}

#topcard .extra-info {
  margin-top: 10px
}

#topcard .extra-info th, #topcard .extra-info td {
  margin-bottom: 3px;
  padding-top: 6px;
  vertical-align: text-top
}

#topcard .extra-info th {
  font-size: 11px;
  color: #999;
  padding-right: 20px;
  white-space: nowrap
}

#topcard .extra-info td {
  font-size: 12px;
  line-height: 14px;
  color: #333;
  font-weight: normal
}

#topcard .extra-info td strong {
  font-weight: bold
}

#topcard .extra-info li {
  display: inline;
  font-size: 12px;
  line-height: 14px;
  color: #333;
  font-weight: normal
}

#topcard .extra-info li a {
  font-size: 12px;
  line-height: 14px;
  color: #333;
  font-weight: normal;
  text-decoration: none
}

#topcard .extra-info li a.hover, #topcard .extra-info li a:hover, #topcard .extra-info li a.focus,
#topcard .extra-info li a:focus {
  text-decoration: none;
  color: #006fa6;
  cursor: pointer
}

.ie #topcard .extra-info li a.hover, .ie #topcard .extra-info li a:hover,
.ie #topcard .extra-info li a.focus, .ie #topcard .extra-info li a:focus {
  cursor: hand
}

#topcard .websites li {
  display: block
}

#topcard .member-connections, #topcard .influencer-badge {
  position: absolute;
  top: 20px;
  right: 20px;
  float: right
}

#topcard .member-connections {
  font-size: 11px;
  color: #999;
  padding: 7px 0 0 10px;
  line-height: 15px;
  vertical-align: bottom;
  text-align: right
}

#topcard .member-connections strong {
  font-weight: bold;
  display: block;
  color: #333;
  font-size: 18px;
  line-height: 14px
}

#topcard .influencer-badge {
  display: -moz-inline-stack;
  display: inline-block;
  vertical-align: middle;
  * vertical-align: auto;
  zoom: 1;
  * display: inline;
  vertical-align: baseline;
  font-size: 14px;
  line-height: 14px;
  color: #333;
  background-image: url('https://www.linkedin.com/sc/h/8vcxa9840vpd17tibshqi9ksm');
  text-indent: -119988px;
  overflow: hidden;
  text-align: left;
  background-position: 0 0;
  width: 90px;
  height: 22px
}

#topcard .influencer-badge sup {
  top: 0;
  vertical-align: baseline;
  font-weight: normal;
  font-size: 78%
}

#experience .item-title {
  margin-right: 100px
}

#experience .no-experience-desc-signup {
  display: block;
  margin-top: 6px;
  font-size: 14px
}

#experience .experience-cta {
  padding: 18px 0;
  min-height: 0
}

#experience .experience-cta .signup-link {
  display: block;
  text-align: center;
  text-decoration: none;
  font-family: "Source Sans Pro", "Helvetica Neue", Helvetica, Arial, sans-serif;
  font-weight: 600;
  font-size: 17px;
  color: #1A84BC
}

.reg-upsell {
  border-top: 1px solid #ddd;
  padding: 25px 40px 20px
}

.reg-upsell.full-click {
  cursor: pointer
}

.reg-upsell.advocate-cta-enabled {
  padding: 20px 35px 25px;
  background: rgba(0, 140, 201, 0.9);
  background: linear-gradient(to right, rgba(0, 140, 201, 0.9), rgba(0, 158, 165, 0.9))
}

.reg-upsell.advocate-cta-enabled.lazy-load {
  opacity: 1
}

.reg-upsell.advocate-cta-enabled.lazy-loaded {
  background: linear-gradient(to right, rgba(0, 140, 201, 0.9), rgba(0, 158, 165, 0.9)), url('https://www.linkedin.com/sc/h/cbzvh65ro0gik9g9fujjyamlx') no-repeat center / cover
}

.reg-upsell.advocate-cta-enabled h2, .reg-upsell.advocate-cta-enabled h3,
.reg-upsell.advocate-cta-enabled .signup-button {
  font-family: "Source Sans Pro", "Helvetica Neue", Helvetica, Arial, sans-serif
}

.reg-upsell.advocate-cta-enabled h2 {
  color: #ffffff;
  font-weight: 400;
  font-size: 42px;
  line-height: 44px;
  padding-bottom: 6px
}

.reg-upsell.advocate-cta-enabled h3 {
  color: #ffffff;
  font-weight: 200;
  font-size: 16px;
  letter-spacing: 0.1px;
  line-height: 20px
}

.reg-upsell.advocate-cta-enabled .signup-button {
  color: rgba(0, 0, 0, 0.8);
  background-color: #ffffff;
  background-image: none;
  border: none;
  transition-timing-function: cubic-bezier(0, 0, 0.2, 1);
  transition-property: background-color, box-shadow, color;
  transition-duration: 167ms
}

.reg-upsell.advocate-cta-enabled .signup-button:hover {
  color: #000000;
  background-color: rgba(255, 255, 255, 0.85);
  background-image: none;
  transition-property: background-color, box-shadow, color;
  transition-duration: 140ms
}

.reg-upsell h2 {
  font-size: 26px;
  font-weight: normal;
  line-height: 30px;
  color: #434649;
  padding-bottom: 12px
}

.reg-upsell h3 {
  font-size: 16px;
  font-weight: normal;
  line-height: 18px;
  color: #434649;
  padding: 0 0 12px
}

.reg-upsell .signup-button {
  font-weight: bold;
  border-width: 1px;
  border-style: solid;
  cursor: pointer;
  margin: 0;
  overflow: visible;
  text-decoration: none !important;
  text-align: center;
  width: auto;
  text-shadow: 0 1px 1px rgba(255, 255, 255, 0.75);
  -webkit-border-radius: 3px;
  -moz-border-radius: 3px;
  -ms-border-radius: 3px;
  -o-border-radius: 3px;
  border-radius: 3px;
  padding: 0 13px;
  height: 31px;
  line-height: 29px;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  font-size: 13px;
  color: #333;
  background-color: #f6e312;
  border-color: #e9ac1a;
  filter: progid: DXImageTransform.Microsoft.gradient(gradientType=0, startColorstr='#FFF6E312', endColorstr='#FFF9C80D');
  background-image: -webkit-linear-gradient(top, #f6e312 0%, #f9c80d 100%);
  background-image: -moz-linear-gradient(top, #f6e312 0%, #f9c80d 100%);
  background-image: -o-linear-gradient(top, #f6e312 0%, #f9c80d 100%);
  background-image: linear-gradient(top, #f6e312 0%, #f9c80d 100%);
  white-space: nowrap;
  display: -moz-inline-stack;
  display: inline-block;
  vertical-align: middle;
  * vertical-align: auto;
  zoom: 1;
  * display: inline;
  vertical-align: middle;
  display: -moz-inline-stack;
  display: inline-block;
  vertical-align: middle;
  * vertical-align: auto;
  zoom: 1;
  * display: inline;
  padding-bottom: 12px
}

.reg-upsell .signup-button.hover, .reg-upsell .signup-button:hover,
.reg-upsell .signup-button.focus, .reg-upsell .signup-button:focus {
  background-color: #eddb11;
  filter: progid: DXImageTransform.Microsoft.gradient(gradientType=0, startColorstr='#FFEDDB11', endColorstr='#FFF2B21B');
  background-image: -webkit-linear-gradient(top, #eddb11 0%, #efcf14 35%, #f1bf18 65%, #f2b21b 100%);
  background-image: -moz-linear-gradient(top, #eddb11 0%, #efcf14 35%, #f1bf18 65%, #f2b21b 100%);
  background-image: -o-linear-gradient(top, #eddb11 0%, #efcf14 35%, #f1bf18 65%, #f2b21b 100%);
  background-image: linear-gradient(top, #eddb11 0%, #efcf14 35%, #f1bf18 65%, #f2b21b 100%);
  -webkit-box-shadow: 0 1px 3px rgba(0, 0, 0, 0.25);
  -moz-box-shadow: 0 1px 3px rgba(0, 0, 0, 0.25);
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.25)
}

.reg-upsell .signup-button.active, .reg-upsell .signup-button:active {
  -webkit-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.25) inset;
  -moz-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.25) inset;
  box-shadow: 0 1px 2px rgba(0, 0, 0, 0.25) inset
}

.reg-upsell .signup-button.disabled, .reg-upsell .signup-button[disabled] {
  background-color: #eddb11;
  filter: progid: DXImageTransform.Microsoft.gradient(gradientType=0, startColorstr='#FFEDDB11', endColorstr='#FFF2B21B');
  background-image: -webkit-linear-gradient(top, #eddb11 0%, #efcf14 35%, #f1bf18 65%, #f2b21b 100%);
  background-image: -moz-linear-gradient(top, #eddb11 0%, #efcf14 35%, #f1bf18 65%, #f2b21b 100%);
  background-image: -o-linear-gradient(top, #eddb11 0%, #efcf14 35%, #f1bf18 65%, #f2b21b 100%);
  background-image: linear-gradient(top, #eddb11 0%, #efcf14 35%, #f1bf18 65%, #f2b21b 100%);
  -webkit-box-shadow: none;
  -moz-box-shadow: none;
  box-shadow: none;
  cursor: default;
  filter: progid: DXImageTransform.Microsoft.Alpha(Opacity=60);
  opacity: 0.6
}

.reg-upsell ul {
  padding-bottom: 12px
}

.reg-upsell ul li {
  font-size: 13px;
  line-height: 17px;
  color: #333;
  font-weight: normal;
  font-size: 12px;
  border: 0;
  padding: 0
}

.reg-upsell ul li:before {
  content: "\2022";
  padding-right: 6px
}

.reg-upsell strong {
  font-weight: bold
}

.reg-upsell .view-more {
  margin-top: 12px;
  font-size: 13px;
  line-height: 17px;
  color: #333;
  font-weight: normal
}

.reg-upsell .view-more a {
  font-size: 13px;
  line-height: 17px;
  color: #006fa6;
  font-weight: normal;
  text-decoration: none
}

.reg-upsell .view-more a.hover, .reg-upsell .view-more a:hover, .reg-upsell .view-more a.focus,
.reg-upsell .view-more a:focus {
  text-decoration: underline
}

.reg-upsell .view-more a.visited, .reg-upsell .view-more a:visited {
  color: #96999c
}

#posts h3 {
  padding-bottom: 0
}

#posts .see-more {
  font-size: 13px;
  line-height: 17px;
  color: #66696a;
  padding: 0 10px 0 35px;
  position: relative;
  margin-bottom: 16px;
  display: inline-block
}

#posts .see-more:after {
  height: 0;
  width: 0;
  border-style: dashed;
  border-color: transparent;
  border-width: 4px 0 4px 4px;
  border-left-color: #666;
  border-left-style: solid;
  top: 5px;
  right: 0;
  content: "";
  position: absolute
}

#posts ul {
  padding: 0 35px 35px
}

#posts .expanding-wrapper {
  float: left
}

#posts .post {
  display: inline-block;
  vertical-align: top;
  width: 180px;
  min-height: 135px;
  position: relative;
  border: 0;
  padding: 0 10px 0 0
}

#posts .post img {
  width: 100%;
  height: 135px
}

#posts .post .item-title {
  font-size: 14px;
  font-weight: bold;
  line-height: 16px;
  color: #000;
  margin-top: 5px
}

#posts .post .item-title a {
  font-size: 14px;
  font-weight: bold;
  line-height: 16px;
  color: #000;
  text-decoration: none
}

#posts .post .item-title a.hover, #posts .post .item-title a:hover,
#posts .post .item-title a.focus, #posts .post .item-title a:focus {
  text-decoration: none;
  color: #006fa6;
  cursor: pointer
}

.ie #posts .post .item-title a.hover, .ie #posts .post .item-title a:hover,
.ie #posts .post .item-title a.focus, .ie #posts .post .item-title a:focus {
  cursor: hand
}

#posts .post .time {
  font-size: 12px;
  line-height: 14px;
  color: #66696a;
  margin-top: 3px
}

#summary .description {
  padding: 15px 35px 30px
}

#languages ul {
  padding: 0 35px 15px
}

#languages ul.voter-form {
  padding: 0
}

#languages .language {
  border: 0;
  padding: 30px 0;
  display: inline-block;
  width: 50%;
  box-sizing: border-box;
  vertical-align: top
}

#languages .language .name {
  font-size: 16px;
  font-weight: bold;
  line-height: 18px;
  color: #000
}

#languages .language .proficiency {
  font-size: 13px;
  line-height: 17px;
  color: #333;
  font-weight: normal;
  margin-top: 5px
}

#volunteering .extra-section {
  border-top: 1px solid #ddd;
  padding: 30px 35px
}

#volunteering .extra-section li {
  font-size: 13px;
  line-height: 17px;
  color: #333;
  font-weight: normal
}

#volunteering .extra-section:nth-child(2) {
  border-top: 0
}

#volunteering .organizations-title {
  margin-top: 35px
}

#volunteering .opportunities .title {
  padding-top: 0;
  padding-left: 0
}

#volunteering .opportunities ul {
  padding-top: 10px
}

#volunteering .opportunities ul li:before {
  content: "\2022";
  padding-right: 6px
}

#volunteering .extra-section .title {
  padding-top: 0;
  padding-left: 0;
  margin-bottom: 5px;
  font-size: 16px;
  font-weight: bold;
  line-height: 18px;
  color: #000
}

#groups > ul {
  padding: 30px 30px 0 20px
}

#groups.profile-section .logo img {
  max-width: 100px;
  max-height: 100px
}

#groups .group {
  padding: 0 0 30px 15px;
  border: 0;
  width: 134px;
  display: inline-block
}

#groups .group h4 {
  font-size: 14px;
  font-weight: bold;
  line-height: 16px;
  color: #000;
  font-size: 12px
}

#groups .group h4 a {
  font-size: 14px;
  font-weight: bold;
  line-height: 16px;
  color: #000;
  text-decoration: none;
  display: block;
  font-size: 12px;
  white-space: nowrap;
  overflow: hidden;
  -ms-text-overflow: ellipsis;
  -o-text-overflow: ellipsis;
  text-overflow: ellipsis
}

#groups .group h4 a.hover, #groups .group h4 a:hover, #groups .group h4 a.focus,
#groups .group h4 a:focus {
  text-decoration: none;
  color: #006fa6;
  cursor: pointer
}

.ie #groups .group h4 a.hover, .ie #groups .group h4 a:hover, .ie #groups .group h4 a.focus,
.ie #groups .group h4 a:focus {
  cursor: hand
}

#groups .group h4 a:visited {
  font-size: 14px;
  font-weight: bold;
  line-height: 16px;
  color: #000;
  text-decoration: none;
  font-size: 12px
}

#groups .group h4 a:visited.hover, #groups .group h4 a:visited:hover,
#groups .group h4 a:visited.focus, #groups .group h4 a:visited:focus {
  text-decoration: none;
  color: #006fa6;
  cursor: pointer
}

.ie #groups .group h4 a:visited.hover, .ie #groups .group h4 a:visited:hover,
.ie #groups .group h4 a:visited.focus, .ie #groups .group h4 a:visited:focus {
  cursor: hand
}

#groups .group .logo {
  float: none
}

#groups .extra {
  display: none
}

#groups .see-more .wrap-icon, #groups .see-less .wrap-icon {
  display: block;
  height: 28px;
  width: 18px;
  padding: 16px 21px;
  background: #f4f4f4;
  text-align: center;
  margin-top: 0px;
  margin-bottom: 10px
}

#groups .see-more .wrap-icon i, #groups .see-less .wrap-icon i {
  display: block;
  height: 28px;
  width: 18px
}

#groups .see-more .wrap, #groups .see-less .wrap {
  font-size: 12px;
  line-height: 14px;
  color: #0073B2;
  font-weight: normal;
  text-decoration: none;
  display: block
}

#groups .see-more .wrap .caption:after, #groups .see-less .wrap .caption:before {
  display: inline-block;
  vertical-align: middle;
  height: 10px;
  width: 6px;
  content: '';
  margin-left: 5px;
  margin-right: 5px
}

#groups .see-more .wrap .caption:after {
  background: url(https://www.linkedin.com/scds/common/u/images/apps/profile/sprite/sprite_profile_tools_v8.png) 0 -500px no-repeat
}

#groups .see-more .wrap-icon i {
  background: url(https://www.linkedin.com/scds/common/u/images/apps/profile/sprite/sprite_profile_tools_v8.png) 0 -800px no-repeat
}

#groups .see-more:hover .wrap .wrap-icon i {
  background-position: 0 -850px
}

#groups .see-less .wrap .caption:before {
  background: url(https://www.linkedin.com/scds/common/u/images/apps/profile/sprite/sprite_profile_tools_v8.png) 0 -600px no-repeat
}

#groups .see-less .wrap-icon i {
  background: url(https://www.linkedin.com/scds/common/u/images/apps/profile/sprite/sprite_profile_tools_v8.png) 0 -700px no-repeat
}

#groups .see-less:hover .wrap .wrap-icon i {
  background-position: 0 -750px
}

#groups .expander-state-checkbox:checked ~ .see-more {
  display: none
}

#groups .expander-state-checkbox:checked ~ .extra {
  display: inline-block
}

.insights {
  margin-bottom: 10px
}

.insights .name-search, .insights .badge, .insights .browse-map {
  background: #fff;
  -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, 0.15), -1px 0 0 rgba(0, 0, 0, 0.03), 1px 0 0 rgba(0, 0, 0, 0.03), 0 1px 0 rgba(0, 0, 0, 0.12);
  -moz-box-shadow: 0 1px 1px rgba(0, 0, 0, 0.15), -1px 0 0 rgba(0, 0, 0, 0.03), 1px 0 0 rgba(0, 0, 0, 0.03), 0 1px 0 rgba(0, 0, 0, 0.12);
  box-shadow: 0 1px 1px rgba(0, 0, 0, 0.15), -1px 0 0 rgba(0, 0, 0, 0.03), 1px 0 0 rgba(0, 0, 0, 0.03), 0 1px 0 rgba(0, 0, 0, 0.12);
  padding: 0 20px 20px
}

.ie.lte8 .insights .name-search, .ie.lte8 .insights .badge, .ie.lte8 .insights .browse-map {
  border-bottom: 2px solid #ccc
}

.insights .badge {
  margin-top: 10px
}

.insights .browse-map {
  margin-top: 0px
}

.insights .title {
  font-size: 14px;
  font-weight: bold;
  line-height: 16px;
  color: #000;
  padding: 20px 0
}

.insights .profile-card {
  min-height: 60px;
  margin-bottom: 5px;
  border: 0;
  padding: 0
}

.insights .profile-card .info {
  display: inline-block;
  vertical-align: top;
  width: 200px
}

.insights .profile-card > a {
  display: inline-block;
  vertical-align: top
}

.insights .profile-card img {
  width: 60px;
  height: 60px;
  padding-right: 10px
}

.insights .profile-card h4 {
  font-size: 13px;
  font-weight: bold;
  line-height: 17px;
  color: #000;
  margin-bottom: 0
}

.insights .profile-card h4 a {
  font-size: 13px;
  font-weight: bold;
  line-height: 17px;
  color: #006fa6;
  text-decoration: none
}

.insights .profile-card h4 a.hover, .insights .profile-card h4 a:hover,
.insights .profile-card h4 a.focus, .insights .profile-card h4 a:focus {
  text-decoration: underline
}

.insights .profile-card h4 a.visited, .insights .profile-card h4 a:visited {
  color: #96999c
}

.insights .profile-card .headline, .insights .profile-card .location {
  font-size: 12px;
  line-height: 14px;
  color: #333;
  font-weight: normal
}

.name-search .blurb {
  font-size: 13px;
  line-height: 17px;
  color: #333;
  font-weight: normal;
  padding-bottom: 10px
}

.name-search form label {
  display: none
}

.name-search form input[type="text"] {
  background: #fdfdfd;
  vertical-align: middle;
  -webkit-border-radius: 2px;
  -moz-border-radius: 2px;
  -ms-border-radius: 2px;
  -o-border-radius: 2px;
  border-radius: 2px;
  padding: 5px 6px 4px;
  -webkit-box-shadow: 0 0 3px rgba(0, 0, 0, 0.1) inset;
  -moz-box-shadow: 0 0 3px rgba(0, 0, 0, 0.1) inset;
  box-shadow: 0 0 3px rgba(0, 0, 0, 0.1) inset;
  border: 1px solid #c1c1c1;
  font-size: 13px;
  color: #333;
  width: 100px;
  margin: 0 10px 0 0
}

.name-search form input[type="text"].focus, .name-search form input[type="text"]:focus {
  background: #fff;
  outline: 0;
  border: 1px solid #0077b5
}

.name-search form input[type="text"].disabled, .name-search form input[type="text"][disabled] {
  filter: progid: DXImageTransform.Microsoft.Alpha(Opacity=50);
  opacity: 0.5;
  cursor: not-allowed
}

.name-search form button {
  background: none;
  border: none;
  padding: 0;
  -webkit-appearance: none;
  -moz-appearance: none;
  appearance: none
}

.name-search form button span:after {
  font-family: "LinkedIn-Glyphs-2.0.7", "LinkedIn-Glyphs";
  font-weight: normal;
  font-style: normal;
  text-decoration: inherit;
  speak: none;
  font-size: 16px;
  color: #0077b5;
  content: "\e004"
}

.name-search form button span:after {
  position: relative;
  top: 2px;
  padding-left: 5px
}

.name-search form .tip {
  padding-top: 10px;
  font-size: 13px;
  font-weight: normal;
  line-height: 17px;
  color: #434649
}

.name-search form .tip strong {
  font-weight: bold
}

.name-search ul {
  margin-top: 15px
}

.name-search .same-name-search-more {
  font-size: 13px;
  line-height: 17px;
  color: #006fa6;
  font-weight: normal;
  text-decoration: none
}

.name-search .same-name-search-more.hover, .name-search .same-name-search-more:hover,
.name-search .same-name-search-more.focus, .name-search .same-name-search-more:focus {
  text-decoration: underline
}

.name-search .same-name-search-more.visited, .name-search .same-name-search-more:visited {
  color: #96999c
}

#directory {
  float: left;
  width: 974px;
  margin: 20px 0;
  padding-top: 20px;
  white-space: nowrap;
  text-align: center;
  border-top: 1px solid #ccc
}

#directory h3 {
  display: inline;
  font-size: 12px;
  line-height: 14px;
  color: #333;
  font-weight: normal;
  color: #666
}

#directory ol {
  display: inline;
  font-size: 12px;
  line-height: 14px;
  color: #333;
  font-weight: normal
}

#directory ol li {
  display: inline-block
}

#directory ol li a {
  display: inline-block;
  padding: 0 3px
}

#directory .country-search {
  margin-left: 5px;
  padding-left: 10px;
  border-left: 1px solid #ccc
}

#locale-switcher {
  padding: 10px 20px 0;
  position: relative;
  background: #fff;
  box-shadow: -1px 0 0 rgba(0, 0, 0, 0.03), 1px 0 0 rgba(0, 0, 0, 0.03)
}

#locale-switcher.language-selector--box-shadow {
  margin-bottom: 10px;
  padding-bottom: 20px;
  box-shadow: 0 1px 1px rgba(0, 0, 0, 0.15), -1px 0 0 rgba(0, 0, 0, 0.03), 1px 0 0 rgba(0, 0, 0, 0.03), 0 1px 0 rgba(0, 0, 0, 0.12)
}

#locale-switcher .dropdown-label {
  font-size: 13px;
  line-height: 17px;
  color: #66696a;
  text-align: left;
  width: 100%;
  position: relative;
  display: inline-block;
  vertical-align: top;
  cursor: pointer;
  padding-top: 10px;
  padding-left: 2px;
  border: 1px solid transparent
}

#locale-switcher .dropdown-label:before {
  font-family: "LinkedIn-Glyphs-2.0.7", "LinkedIn-Glyphs";
  font-weight: normal;
  font-style: normal;
  text-decoration: inherit;
  speak: none;
  font-size: 16px;
  color: inherit;
  content: "\e051"
}

#locale-switcher .dropdown-label:after {
  font-family: "LinkedIn-Glyphs-2.0.7", "LinkedIn-Glyphs";
  font-weight: normal;
  font-style: normal;
  text-decoration: inherit;
  speak: none;
  font-size: 16px;
  color: inherit;
  content: "\e02a"
}

#locale-switcher .dropdown-label:before {
  padding-right: 5px
}

#locale-switcher .dropdown-label:after {
  position: absolute;
  right: 0
}

#locale-switcher .expander-checkbox {
  position: absolute !important;
  height: 1px;
  width: 1px;
  overflow: hidden;
  clip: rect(1px, 1px, 1px, 1px)
}

#locale-switcher .expander-checkbox:checked ~ .locales {
  display: block
}

#locale-switcher .expander-checkbox:focus ~ .dropdown-label {
  border: 1px solid #3B99FC
}

#locale-switcher .locales {
  background: #fff;
  -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, 0.15), -1px 0 0 rgba(0, 0, 0, 0.03), 1px 0 0 rgba(0, 0, 0, 0.03), 0 1px 0 rgba(0, 0, 0, 0.12);
  -moz-box-shadow: 0 1px 1px rgba(0, 0, 0, 0.15), -1px 0 0 rgba(0, 0, 0, 0.03), 1px 0 0 rgba(0, 0, 0, 0.03), 0 1px 0 rgba(0, 0, 0, 0.12);
  box-shadow: 0 1px 1px rgba(0, 0, 0, 0.15), -1px 0 0 rgba(0, 0, 0, 0.03), 1px 0 0 rgba(0, 0, 0, 0.03), 0 1px 0 rgba(0, 0, 0, 0.12);
  display: none;
  width: 282px;
  z-index: 1;
  position: absolute;
  border: 0;
  border-top: 1px solid #DFDEDF;
  margin-top: 10px;
  padding: 5px 0
}

.ie.lte8 #locale-switcher .locales {
  border-bottom: 2px solid #ccc
}

#locale-switcher .locales .locale {
  font-size: 13px;
  line-height: 17px;
  color: #66696a;
  position: relative;
  padding: 5px 20px 5px 45px
}

#locale-switcher .locales .locale a {
  font-size: 13px;
  line-height: 17px;
  color: #66696a;
  text-decoration: none
}

#locale-switcher .locales .locale a.hover, #locale-switcher .locales .locale a:hover,
#locale-switcher .locales .locale a.focus, #locale-switcher .locales .locale a:focus {
  text-decoration: none;
  color: #006fa6;
  cursor: pointer
}

.ie #locale-switcher .locales .locale a.hover, .ie #locale-switcher .locales .locale a:hover,
.ie #locale-switcher .locales .locale a.focus, .ie #locale-switcher .locales .locale a:focus {
  cursor: hand
}

#locale-switcher .locales .locale.current {
  font-weight: bold
}

#locale-switcher .locales .locale.current:before {
  font-family: "LinkedIn-Glyphs-2.0.7", "LinkedIn-Glyphs";
  font-weight: normal;
  font-style: normal;
  text-decoration: inherit;
  speak: none;
  font-size: 16px;
  color: #7cbb2f;
  content: "\e00e"
}

#locale-switcher .locales .locale.current:before {
  position: absolute;
  left: 20px
}

#ad {
  padding: 10px 0 20px;
  text-align: center
}

#recommendations .content {
  padding: 0 35px 25px
}

#recommendations .description {
  margin-top: 20px
}

#recommendations .recommendation-container {
  display: -moz-inline-stack;
  display: inline-block;
  vertical-align: middle;
  * vertical-align: auto;
  zoom: 1;
  * display: inline;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  vertical-align: top;
  width: 50%;
  margin-top: 15px
}

#recommendations .recommendation {
  font-style: italic;
  font-size: 13px;
  line-height: 17px;
  color: #333;
  position: relative;
  margin-top: 5px;
  margin-bottom: 5px;
  padding-left: 30px;
  padding-right: 5px;
  overflow: hidden;
  -ms-text-overflow: ellipsis;
  -o-text-overflow: ellipsis;
  text-overflow: ellipsis;
  max-height: 68px;
  -webkit-transition: max-height 0.6s;
  -moz-transition: max-height 0.6s;
  -o-transition: max-height 0.6s;
  transition: max-height 0.6s;
  display: -webkit-box;
  -webkit-line-clamp: 4;
  -webkit-box-orient: vertical
}

#recommendations .recommendation {
  font-family: Georgia, serif
}

#recommendations .recommendation:before {
  font-family: "LinkedIn-Glyphs-2.0.7", "LinkedIn-Glyphs";
  font-weight: normal;
  font-style: normal;
  text-decoration: inherit;
  speak: none;
  font-size: 16px;
  color: #caccce;
  content: "\e080"
}

#recommendations .recommendation:before {
  position: absolute;
  top: 0px;
  left: 1px
}

#recommendations .recommendation p {
  font-size: inherit;
  line-height: inherit;
  color: inherit;
  margin-top: 0;
  margin-left: 0;
  margin-bottom: 10px;
  margin-right: 0
}

#recommendations .signup-link {
  font-size: 13px;
  line-height: 17px;
  color: #006fa6;
  font-weight: normal;
  text-decoration: none;
  display: block;
  margin-top: 17px
}

#recommendations .signup-link.hover, #recommendations .signup-link:hover,
#recommendations .signup-link.focus, #recommendations .signup-link:focus {
  text-decoration: underline
}

#recommendations .signup-link.visited, #recommendations .signup-link:visited {
  color: #96999c
}

#recommendations .recommendation-state, #recommendations .recommendation-state:checked ~ .see-more-action,
#recommendations .see-less-action {
  display: none
}

#recommendations .recommendation-state:checked ~ .see-less-action {
  display: inline
}

#recommendations .see-more-action, #recommendations .see-less-action {
  font-size: 12px;
  line-height: 14px;
  color: #006fa6;
  font-weight: normal;
  text-decoration: none;
  padding-left: 30px
}

#recommendations .see-more-action.hover, #recommendations .see-more-action:hover,
#recommendations .see-more-action.focus, #recommendations .see-more-action:focus,
#recommendations .see-less-action.hover, #recommendations .see-less-action:hover,
#recommendations .see-less-action.focus, #recommendations .see-less-action:focus {
  text-decoration: underline
}

#recommendations .see-more-action.visited, #recommendations .see-more-action:visited,
#recommendations .see-less-action.visited, #recommendations .see-less-action:visited {
  color: #96999c
}

#recommendations .recommendation-state:checked ~ .recommendation {
  max-height: 800px;
  -webkit-line-clamp: inherit
}

#recommendations {
  position: relative
}

#recommendations .proprofile {
  padding: 0
}

.proprofile-recommendation {
  display: flex;
  padding: 24px 35px 24px 0;
  margin-left: 35px;
  font-family: "Source Sans Pro", "Helvetica Neue", Helvetica, Arial, sans-serif;
  border-bottom: 1px solid rgba(0, 0, 0, 0.15)
}

.proprofile-recommendation:last-of-type {
  border: none
}

.proprofile-recommendation-seemore {
  max-height: 0;
  transition: max-height .5s;
  overflow: hidden
}

.proprofile-recommendation-seemore .proprofile-recommendation {
  position: relative;
  bottom: 0;
  border-bottom: none;
  border-top: 1px solid rgba(0, 0, 0, 0.15)
}

#proprofile-recommendation__show-more-checkbox {
  display: none
}

#proprofile-recommendation__show-more-checkbox:checked ~ .proprofile-recommendation-seemore {
  max-height: 999px
}

#proprofile-recommendation__show-more-checkbox:checked ~ label[for="proprofile-recommendation__show-more-checkbox"] .see-more {
  display: none
}

#proprofile-recommendation__show-more-checkbox:checked ~ label[for="proprofile-recommendation__show-more-checkbox"] .see-less {
  display: inline
}

.proprofile-recommendation__text {
  font-size: 17px;
  line-height: 24px;
  color: rgba(0, 0, 0, 0.85);
  position: relative;
  padding-left: 25px;
  padding-right: 5px;
  overflow: hidden
}

.proprofile-recommendation__text:before {
  position: absolute;
  top: 0px;
  left: 1px;
  font-family: "LinkedIn-Glyphs-2.0.3", "LinkedIn-Glyphs";
  font-weight: normal;
  font-style: normal;
  text-decoration: inherit;
  speak: none;
  font-size: 13px;
  color: rgba(0, 0, 0, 0.85);
  content: "\e080"
}

label[for="proprofile-recommendation__show-more-checkbox"] {
  padding: 18px 0;
  display: block;
  border-top: 1px solid rgba(0, 0, 0, 0.15);
  text-align: center;
  font-family: "Source Sans Pro", "Helvetica Neue", Helvetica, Arial, sans-serif;
  font-size: 17px;
  color: #1A84BC;
  cursor: pointer;
  font-weight: 600
}

label[for="proprofile-recommendation__show-more-checkbox"] .see-less {
  display: none
}

#recommendations-anchor {
  position: absolute;
  top: -58px
}

.unified-cta {
  visibility: hidden;
  opacity: 0;
  position: fixed;
  bottom: 0;
  left: 0;
  width: 100%;
  z-index: 10;
  -webkit-transition: opacity 0.5s ease-in;
  -moz-transition: opacity 0.5s ease-in;
  -o-transition: opacity 0.5s ease-in;
  transition: opacity 0.5s ease-in
}

.unified-cta .mask-screen {
  position: absolute;
  left: 0;
  right: 0;
  top: 0;
  bottom: 0;
  background: #000;
  opacity: 0.8;
  z-index: -1
}

.unified-cta .content {
  padding: 10px;
  text-align: center
}

.unified-cta .content h3 {
  font-size: 26px;
  font-weight: bold;
  line-height: 30px;
  color: #fff;
  margin-bottom: 10px
}

.unified-cta .content .view-full {
  font-weight: bold;
  border-width: 1px;
  border-style: solid;
  cursor: pointer;
  margin: 0;
  overflow: visible;
  text-decoration: none !important;
  text-align: center;
  width: auto;
  text-shadow: 0 1px 1px rgba(255, 255, 255, 0.75);
  -webkit-border-radius: 3px;
  -moz-border-radius: 3px;
  -ms-border-radius: 3px;
  -o-border-radius: 3px;
  border-radius: 3px;
  padding: 0 15px;
  height: 34px;
  line-height: 32px;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  font-size: 16px;
  color: #333;
  background-color: #f6e312;
  border-color: #313131;
  filter: progid: DXImageTransform.Microsoft.gradient(gradientType=0, startColorstr='#FFF6E312', endColorstr='#FFF9C80D');
  background-image: -webkit-linear-gradient(top, #f6e312 0%, #f9c80d 100%);
  background-image: -moz-linear-gradient(top, #f6e312 0%, #f9c80d 100%);
  background-image: -o-linear-gradient(top, #f6e312 0%, #f9c80d 100%);
  background-image: linear-gradient(top, #f6e312 0%, #f9c80d 100%);
  white-space: nowrap;
  display: -moz-inline-stack;
  display: inline-block;
  vertical-align: middle;
  * vertical-align: auto;
  zoom: 1;
  * display: inline;
  vertical-align: middle;
  padding: 4px 40px;
  line-height: 24px;
  white-space: normal;
  height: auto
}

.unified-cta .content .view-full.hover, .unified-cta .content .view-full:hover,
.unified-cta .content .view-full.focus, .unified-cta .content .view-full:focus {
  background-color: #eddb11;
  filter: progid: DXImageTransform.Microsoft.gradient(gradientType=0, startColorstr='#FFEDDB11', endColorstr='#FFEFCF14');
  background-image: -webkit-linear-gradient(top, #eddb11 0%, #efcf14 35%, #f1bf18 65%, #f2b21b 100%);
  background-image: -moz-linear-gradient(top, #eddb11 0%, #efcf14 35%, #f1bf18 65%, #f2b21b 100%);
  background-image: -o-linear-gradient(top, #eddb11 0%, #efcf14 35%, #f1bf18 65%, #f2b21b 100%);
  background-image: linear-gradient(top, #eddb11 0%, #efcf14 35%, #f1bf18 65%, #f2b21b 100%);
  -webkit-box-shadow: 0 1px 3px rgba(0, 0, 0, 0.25);
  -moz-box-shadow: 0 1px 3px rgba(0, 0, 0, 0.25);
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.25)
}

.unified-cta .content .view-full.active, .unified-cta .content .view-full:active {
  -webkit-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.25) inset;
  -moz-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.25) inset;
  box-shadow: 0 1px 2px rgba(0, 0, 0, 0.25) inset
}

.unified-cta .content .view-full.disabled, .unified-cta .content .view-full[disabled] {
  background-color: #eddb11;
  filter: progid: DXImageTransform.Microsoft.gradient(gradientType=0, startColorstr='#FFEDDB11', endColorstr='#FFF2B21B');
  background-image: -webkit-linear-gradient(top, #eddb11 0%, #efcf14 35%, #f1bf18 65%, #f2b21b 100%);
  background-image: -moz-linear-gradient(top, #eddb11 0%, #efcf14 35%, #f1bf18 65%, #f2b21b 100%);
  background-image: -o-linear-gradient(top, #eddb11 0%, #efcf14 35%, #f1bf18 65%, #f2b21b 100%);
  background-image: linear-gradient(top, #eddb11 0%, #efcf14 35%, #f1bf18 65%, #f2b21b 100%);
  -webkit-box-shadow: none;
  -moz-box-shadow: none;
  box-shadow: none;
  cursor: default;
  filter: progid: DXImageTransform.Microsoft.Alpha(Opacity=60);
  opacity: 0.6
}

.unified-cta.reveal {
  visibility: visible;
  opacity: 1
}

.unified-cta.inert {
  visibility: hidden;
  position: static;
  float: left
}

.badge {
  padding: 0 20px 20px;
  margin: 10px 0;
  background: #fff
}

.badge .title {
  font-size: 14px;
  font-weight: bold;
  line-height: 16px;
  color: #000;
  padding: 20px 0
}

.badge .description {
  font-size: 13px;
  line-height: 17px;
  color: #333;
  font-weight: normal;
  margin-top: 0;
  padding-bottom: 20px
}

.badge .cta {
  font-weight: bold;
  border-width: 1px;
  border-style: solid;
  cursor: pointer;
  margin: 0;
  overflow: visible;
  text-decoration: none !important;
  text-align: center;
  width: auto;
  text-shadow: 0 1px 1px rgba(0, 0, 0, 0.35);
  -webkit-border-radius: 3px;
  -moz-border-radius: 3px;
  -ms-border-radius: 3px;
  -o-border-radius: 3px;
  border-radius: 3px;
  padding: 0 13px;
  height: 31px;
  line-height: 29px;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  font-size: 13px;
  color: #fff;
  background-color: #287bbc;
  border-color: #1b5480;
  filter: progid: DXImageTransform.Microsoft.gradient(gradientType=0, startColorstr='#FF287BBC', endColorstr='#FF23639A');
  background-image: -webkit-linear-gradient(top, #287bbc 0%, #23639a 100%);
  background-image: -moz-linear-gradient(top, #287bbc 0%, #23639a 100%);
  background-image: -o-linear-gradient(top, #287bbc 0%, #23639a 100%);
  background-image: linear-gradient(top, #287bbc 0%, #23639a 100%);
  white-space: nowrap;
  display: -moz-inline-stack;
  display: inline-block;
  vertical-align: middle;
  * vertical-align: auto;
  zoom: 1;
  * display: inline;
  vertical-align: middle
}

.badge .cta.hover, .badge .cta:hover, .badge .cta.focus, .badge .cta:focus {
  background-color: #2672ae;
  filter: progid: DXImageTransform.Microsoft.gradient(gradientType=0, startColorstr='#FF2672AE', endColorstr='#FF1E4F7E');
  background-image: -webkit-linear-gradient(top, #2672ae 0%, #1e4f7e 100%);
  background-image: -moz-linear-gradient(top, #2672ae 0%, #1e4f7e 100%);
  background-image: -o-linear-gradient(top, #2672ae 0%, #1e4f7e 100%);
  background-image: linear-gradient(top, #2672ae 0%, #1e4f7e 100%);
  -webkit-box-shadow: 0 1px 3px rgba(0, 0, 0, 0.25);
  -moz-box-shadow: 0 1px 3px rgba(0, 0, 0, 0.25);
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.25)
}

.badge .cta.active, .badge .cta:active {
  -webkit-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.25) inset;
  -moz-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.25) inset;
  box-shadow: 0 1px 2px rgba(0, 0, 0, 0.25) inset
}

.badge .cta.disabled, .badge .cta[disabled] {
  background-color: #2672ae;
  filter: progid: DXImageTransform.Microsoft.gradient(gradientType=0, startColorstr='#FF2672AE', endColorstr='#FF1E4F7E');
  background-image: -webkit-linear-gradient(top, #2672ae 0%, #1e4f7e 100%);
  background-image: -moz-linear-gradient(top, #2672ae 0%, #1e4f7e 100%);
  background-image: -o-linear-gradient(top, #2672ae 0%, #1e4f7e 100%);
  background-image: linear-gradient(top, #2672ae 0%, #1e4f7e 100%);
  -webkit-box-shadow: none;
  -moz-box-shadow: none;
  box-shadow: none;
  cursor: default;
  filter: progid: DXImageTransform.Microsoft.Alpha(Opacity=60);
  opacity: 0.6
}

.jserp {
  background: #fff;
  -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, 0.15), -1px 0 0 rgba(0, 0, 0, 0.03), 1px 0 0 rgba(0, 0, 0, 0.03), 0 1px 0 rgba(0, 0, 0, 0.12);
  -moz-box-shadow: 0 1px 1px rgba(0, 0, 0, 0.15), -1px 0 0 rgba(0, 0, 0, 0.03), 1px 0 0 rgba(0, 0, 0, 0.03), 0 1px 0 rgba(0, 0, 0, 0.12);
  box-shadow: 0 1px 1px rgba(0, 0, 0, 0.15), -1px 0 0 rgba(0, 0, 0, 0.03), 1px 0 0 rgba(0, 0, 0, 0.03), 0 1px 0 rgba(0, 0, 0, 0.12);
  padding: 0 20px 20px;
  margin: 10px 0
}

.ie.lte8 .jserp {
  border-bottom: 2px solid #ccc
}

.jserp .title {
  font-size: 14px;
  font-weight: bold;
  line-height: 16px;
  color: #000;
  padding: 20px 0 15px
}

.jserp li {
  margin-bottom: 5px
}

.jserp li a {
  font-size: 13px;
  line-height: 17px;
  color: #006fa6;
  font-weight: normal;
  text-decoration: none
}

.jserp li a.hover, .jserp li a:hover, .jserp li a.focus, .jserp li a:focus {
  text-decoration: underline
}

.jserp li a.visited, .jserp li a:visited {
  color: #96999c
}

.jserp li:last-child {
  margin-bottom: 0
}

.actions {
  margin-top: 10px
}

.actions .action {
  display: inline-block;
  margin-left: 5px
}

.actions .action a {
  font-weight: bold;
  border-width: 1px;
  border-style: solid;
  cursor: pointer;
  margin: 0;
  overflow: visible;
  text-decoration: none !important;
  text-align: center;
  width: auto;
  text-shadow: 0 1px 1px rgba(255, 255, 255, 0.75);
  -webkit-border-radius: 3px;
  -moz-border-radius: 3px;
  -ms-border-radius: 3px;
  -o-border-radius: 3px;
  border-radius: 3px;
  padding: 0 13px;
  height: 31px;
  line-height: 29px;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  font-size: 13px;
  color: #444;
  background-color: #f2f2f2;
  border-color: #a7a7a7;
  filter: progid: DXImageTransform.Microsoft.gradient(gradientType=0, startColorstr='#FFF2F2F2', endColorstr='#FFD1D1D1');
  background-image: -webkit-linear-gradient(top, #f2f2f2 0%, #e9e9e9 32%, #d8d8d8 74%, #d1d1d1 100%);
  background-image: -moz-linear-gradient(top, #f2f2f2 0%, #e9e9e9 32%, #d8d8d8 74%, #d1d1d1 100%);
  background-image: -o-linear-gradient(top, #f2f2f2 0%, #e9e9e9 32%, #d8d8d8 74%, #d1d1d1 100%);
  background-image: linear-gradient(top, #f2f2f2 0%, #e9e9e9 32%, #d8d8d8 74%, #d1d1d1 100%);
  white-space: nowrap;
  display: -moz-inline-stack;
  display: inline-block;
  vertical-align: middle;
  * vertical-align: auto;
  zoom: 1;
  * display: inline;
  vertical-align: middle
}

.actions .action a.hover, .actions .action a:hover, .actions .action a.focus,
.actions .action a:focus {
  background-color: #e8e8e8;
  filter: progid: DXImageTransform.Microsoft.gradient(gradientType=0, startColorstr='#FFE8E8E8', endColorstr='#FFA9A9A9');
  background-image: -webkit-linear-gradient(top, #e8e8e8 0%, #e3e3e3 13%, #d7d7d7 32%, #b9b9b9 71%, #a9a9a9 100%);
  background-image: -moz-linear-gradient(top, #e8e8e8 0%, #e3e3e3 13%, #d7d7d7 32%, #b9b9b9 71%, #a9a9a9 100%);
  background-image: -o-linear-gradient(top, #e8e8e8 0%, #e3e3e3 13%, #d7d7d7 32%, #b9b9b9 71%, #a9a9a9 100%);
  background-image: linear-gradient(top, #e8e8e8 0%, #e3e3e3 13%, #d7d7d7 32%, #b9b9b9 71%, #a9a9a9 100%);
  -webkit-box-shadow: 0 1px 3px rgba(0, 0, 0, 0.25);
  -moz-box-shadow: 0 1px 3px rgba(0, 0, 0, 0.25);
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.25)
}

.actions .action a.active, .actions .action a:active {
  -webkit-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.25) inset;
  -moz-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.25) inset;
  box-shadow: 0 1px 2px rgba(0, 0, 0, 0.25) inset
}

.actions .action a.disabled, .actions .action a[disabled] {
  background-color: #e8e8e8;
  filter: progid: DXImageTransform.Microsoft.gradient(gradientType=0, startColorstr='#FFE8E8E8', endColorstr='#FFA9A9A9');
  background-image: -webkit-linear-gradient(top, #e8e8e8 0%, #e3e3e3 13%, #d7d7d7 32%, #b9b9b9 71%, #a9a9a9 100%);
  background-image: -moz-linear-gradient(top, #e8e8e8 0%, #e3e3e3 13%, #d7d7d7 32%, #b9b9b9 71%, #a9a9a9 100%);
  background-image: -o-linear-gradient(top, #e8e8e8 0%, #e3e3e3 13%, #d7d7d7 32%, #b9b9b9 71%, #a9a9a9 100%);
  background-image: linear-gradient(top, #e8e8e8 0%, #e3e3e3 13%, #d7d7d7 32%, #b9b9b9 71%, #a9a9a9 100%);
  -webkit-box-shadow: none;
  -moz-box-shadow: none;
  box-shadow: none;
  cursor: default;
  filter: progid: DXImageTransform.Microsoft.Alpha(Opacity=60);
  opacity: 0.6
}

.actions .action:first-child {
  margin-left: 0
}

.actions .action:first-child a {
  font-weight: bold;
  border-width: 1px;
  border-style: solid;
  cursor: pointer;
  margin: 0;
  overflow: visible;
  text-decoration: none !important;
  text-align: center;
  width: auto;
  text-shadow: 0 1px 1px rgba(255, 255, 255, 0.75);
  -webkit-border-radius: 3px;
  -moz-border-radius: 3px;
  -ms-border-radius: 3px;
  -o-border-radius: 3px;
  border-radius: 3px;
  padding: 0 13px;
  height: 31px;
  line-height: 29px;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  font-size: 13px;
  color: #333;
  background-color: #f6e312;
  border-color: #e9ac1a;
  filter: progid: DXImageTransform.Microsoft.gradient(gradientType=0, startColorstr='#FFF6E312', endColorstr='#FFF9C80D');
  background-image: -webkit-linear-gradient(top, #f6e312 0%, #f9c80d 100%);
  background-image: -moz-linear-gradient(top, #f6e312 0%, #f9c80d 100%);
  background-image: -o-linear-gradient(top, #f6e312 0%, #f9c80d 100%);
  background-image: linear-gradient(top, #f6e312 0%, #f9c80d 100%);
  white-space: nowrap;
  display: -moz-inline-stack;
  display: inline-block;
  vertical-align: middle;
  * vertical-align: auto;
  zoom: 1;
  * display: inline;
  vertical-align: middle
}

.actions .action:first-child a.hover, .actions .action:first-child a:hover,
.actions .action:first-child a.focus, .actions .action:first-child a:focus {
  background-color: #eddb11;
  filter: progid: DXImageTransform.Microsoft.gradient(gradientType=0, startColorstr='#FFEDDB11', endColorstr='#FFF2B21B');
  background-image: -webkit-linear-gradient(top, #eddb11 0%, #efcf14 35%, #f1bf18 65%, #f2b21b 100%);
  background-image: -moz-linear-gradient(top, #eddb11 0%, #efcf14 35%, #f1bf18 65%, #f2b21b 100%);
  background-image: -o-linear-gradient(top, #eddb11 0%, #efcf14 35%, #f1bf18 65%, #f2b21b 100%);
  background-image: linear-gradient(top, #eddb11 0%, #efcf14 35%, #f1bf18 65%, #f2b21b 100%);
  -webkit-box-shadow: 0 1px 3px rgba(0, 0, 0, 0.25);
  -moz-box-shadow: 0 1px 3px rgba(0, 0, 0, 0.25);
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.25)
}

.actions .action:first-child a.active, .actions .action:first-child a:active {
  -webkit-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.25) inset;
  -moz-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.25) inset;
  box-shadow: 0 1px 2px rgba(0, 0, 0, 0.25) inset
}

.actions .action:first-child a.disabled, .actions .action:first-child a[disabled] {
  background-color: #eddb11;
  filter: progid: DXImageTransform.Microsoft.gradient(gradientType=0, startColorstr='#FFEDDB11', endColorstr='#FFF2B21B');
  background-image: -webkit-linear-gradient(top, #eddb11 0%, #efcf14 35%, #f1bf18 65%, #f2b21b 100%);
  background-image: -moz-linear-gradient(top, #eddb11 0%, #efcf14 35%, #f1bf18 65%, #f2b21b 100%);
  background-image: -o-linear-gradient(top, #eddb11 0%, #efcf14 35%, #f1bf18 65%, #f2b21b 100%);
  background-image: linear-gradient(top, #eddb11 0%, #efcf14 35%, #f1bf18 65%, #f2b21b 100%);
  -webkit-box-shadow: none;
  -moz-box-shadow: none;
  box-shadow: none;
  cursor: default;
  filter: progid: DXImageTransform.Microsoft.Alpha(Opacity=60);
  opacity: 0.6
}

div.alert.notice {
  position: relative;
  min-width: 974px;
  padding: 10px 0;
  margin-bottom: 0;
  transition: margin-top .25s ease;
  outline: none
}

div.alert.notice a {
  text-decoration: underline;
  font-weight: normal
}

div.alert.notice:before {
  content: none
}

div.alert.notice .wrapper {
  position: relative;
  width: 974px;
  margin: 0 auto;
  padding-left: 36px;
  box-sizing: border-box
}

div.alert.notice .wrapper:before {
  position: absolute;
  top: -2px;
  left: 0;
  line-height: 1;
  font-family: "LinkedIn-Glyphs-2.0.3", "LinkedIn-Glyphs";
  font-weight: normal;
  font-style: normal;
  text-decoration: inherit;
  speak: none;
  font-size: 26px;
  color: inherit;
  content: "\e002"
}

div.alert.notice .wrapper .dismiss {
  top: 4px;
  right: 0
}

#alert-visibility-checkbox {
  display: none
}

#alert-visibility-checkbox:checked + div.alert.notice {
  margin-top: -43px
}

.translation.translated {
  display: none
}

.translation-toggle.translated {
  display: none
}

.translated .translation.original, .translated .translation-toggle.original {
  display: none
}

.translated .translation.translated, .translated .translation-toggle.translated {
  display: inline-block
}

#topcard .translated .translated.translation {
  display: inline
}

.original .translation .original, .original .translation-toggle .original {
  display: inline-block
}

.translation-toggle {
  position: relative;
  top: -1px;
  margin: 0 10px 3px 8px;
  display: inline-block;
  cursor: pointer;
  font-size: 10px;
  line-height: 13px;
  color: #66696a;
  border: 1px solid rgba(102, 105, 106, 0.8);
  border-radius: 2px;
  padding: 2px 4px 2px 4px;
  line-height: 10px;
  font-weight: normal;
  opacity: 0.6
}

.translation-toggle.translated {
  display: none
}

.translation-toggle:hover {
  color: #00A0DC;
  border-color: #00A0DC;
  opacity: 1
}

.skills-section .translation, .skills-section .translated.translation {
  display: none
}

.skills-section .translation-toggle {
  float: right;
  margin: 30px 35px 0 0
}

.skills-section .pills li .translated.translation {
  display: none
}

.skills-section.translated .pills li .translated.translation {
  display: inline-block
}

.skills-section.translated .pills li .original.translation {
  display: none
}

.translation.alert .message.translated .original, .translation.alert .message.translated .toggle-all-translated {
  display: none
}

.translation.alert .message.original .translated, .translation.alert .message.original .toggle-all-original {
  display: none
}

.translation-survey, .translation-survey-response {
  display: none;
  box-shadow: 0px 0px 10px -1px rgba(0, 0, 0, 0.25);
  width: 375px;
  position: fixed;
  z-index: 9999;
  bottom: 32px;
  right: 32px;
  background: #fff;
  border: none;
  overflow: hidden;
  color: #5a5d60;
  outline: 0;
  -webkit-border-radius: 5px;
  -moz-border-radius: 5px;
  -ms-border-radius: 5px;
  -o-border-radius: 5px;
  border-radius: 5px
}

.translation-survey.show, .translation-survey-response.show {
  display: block
}

.translation-survey .expand, .translation-survey-response .expand {
  display: none
}

.translation-survey .a11y-hidden, .translation-survey-response .a11y-hidden {
  position: absolute !important;
  height: 1px;
  width: 1px;
  overflow: hidden;
  clip: rect(1px, 1px, 1px, 1px)
}

.translation-survey .close, .translation-survey-response .close {
  position: relative;
  display: inline-block;
  width: 15px;
  height: 15px;
  float: right;
  background-color: transparent;
  border: none;
  outline: 0;
  margin-top: 3px;
  overflow: hidden
}

.translation-survey .close:hover::before, .translation-survey .close:hover::after,
.translation-survey-response .close:hover::before, .translation-survey-response .close:hover::after {
  background: rgba(255, 255, 255, 0.55)
}

.translation-survey .close::before, .translation-survey .close::after,
.translation-survey-response .close::before, .translation-survey-response .close::after {
  content: '';
  position: absolute;
  height: 2px;
  width: 100%;
  top: 50%;
  left: 0;
  margin-top: -1px;
  background: #fff
}

.translation-survey .close::before, .translation-survey-response .close::before {
  -webkit-transform: rotate(45deg);
  -moz-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  -o-transform: rotate(45deg);
  transform: rotate(45deg)
}

.translation-survey .close::after, .translation-survey-response .close::after {
  -webkit-transform: rotate(-45deg);
  -moz-transform: rotate(-45deg);
  -ms-transform: rotate(-45deg);
  -o-transform: rotate(-45deg);
  transform: rotate(-45deg)
}

.translation-survey .content, .translation-survey-response .content {
  position: relative;
  font-size: 13px;
  line-height: 17px;
  color: #333;
  font-weight: normal;
  min-height: 80px;
  font-size: 14px;
  color: #5a5d60;
  overflow: auto;
  letter-spacing: .5px;
  -webkit-border-radius: 0 0 5px 5px;
  -moz-border-radius: 0 0 5px 5px;
  -ms-border-radius: 0 0 5px 5px;
  -o-border-radius: 0 0 5px 5px;
  border-radius: 0 0 5px 5px
}

.translation-survey .content .headline, .translation-survey-response .content .headline {
  font-size: 14px;
  font-weight: bold;
  line-height: 16px;
  color: #000;
  font-weight: 200;
  color: #5a5d60;
  line-height: 20px;
  padding: 13px 16px
}

.translation-survey .title, .translation-survey .content {
  -webkit-border-radius: 0;
  -moz-border-radius: 0;
  -ms-border-radius: 0;
  -o-border-radius: 0;
  border-radius: 0;
  background: #fff;
  -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, 0.15), -1px 0 0 rgba(0, 0, 0, 0.03), 1px 0 0 rgba(0, 0, 0, 0.03), 0 1px 0 rgba(0, 0, 0, 0.12);
  -moz-box-shadow: 0 1px 1px rgba(0, 0, 0, 0.15), -1px 0 0 rgba(0, 0, 0, 0.03), 1px 0 0 rgba(0, 0, 0, 0.03), 0 1px 0 rgba(0, 0, 0, 0.12);
  box-shadow: 0 1px 1px rgba(0, 0, 0, 0.15), -1px 0 0 rgba(0, 0, 0, 0.03), 1px 0 0 rgba(0, 0, 0, 0.03), 0 1px 0 rgba(0, 0, 0, 0.12)
}

.ie.lte8 .translation-survey .title, .ie.lte8 .translation-survey .content {
  border-bottom: 2px solid #ccc
}

.translation-survey .title {
  background-image: -webkit-linear-gradient(to right, #1691c2, #179fa5);
  background-image: -moz-linear-gradient(to right, #1691c2, #179fa5);
  background-image: -o-linear-gradient(to right, #1691c2, #179fa5);
  background-image: linear-gradient(to right, #1691c2, #179fa5);
  padding: 13px 16px
}

.translation-survey .title h3 {
  font-size: 16px;
  font-weight: bold;
  line-height: 18px;
  color: #000;
  color: #fff;
  font-weight: normal;
  letter-spacing: 1px
}

.translation-survey .survey-option {
  width: 100%;
  padding: 0 0 0 16px;
  font-weight: 300;
  cursor: pointer;
  box-sizing: border-box
}

.translation-survey .survey-option:hover {
  background-color: #f0f4f7
}

.translation-survey .survey-option span {
  display: table-cell;
  padding: 10px 0
}

.translation-survey .survey-option span:last-child {
  width: 340px;
  position: relative;
  top: 1px;
  padding: 5px 0
}

.translation-survey .survey-checkbox {
  margin: 0 13px 0 0;
  outline: 0
}

.translation-survey #otherResponse {
  font-weight: 300;
  padding: 5px;
  width: 303px
}

.translation-survey .error {
  display: none;
  margin: 10px 5px 0 16px;
  color: red;
  width: 45%
}

.translation-survey .error.show {
  display: inline-block
}

.translation-survey .submit-button {
  background: #fff;
  border: 2px solid #009dd3;
  color: #009dd3;
  margin: 10px 16px 13px 16px;
  padding: 10px 20px;
  font-size: 16px;
  font-weight: normal;
  float: right;
  outline: 0;
  -webkit-border-radius: 2px;
  -moz-border-radius: 2px;
  -ms-border-radius: 2px;
  -o-border-radius: 2px;
  border-radius: 2px
}

.translation-survey-response {
  background-image: -webkit-linear-gradient(to right, #1691c2, #179fa5);
  background-image: -moz-linear-gradient(to right, #1691c2, #179fa5);
  background-image: -o-linear-gradient(to right, #1691c2, #179fa5);
  background-image: linear-gradient(to right, #1691c2, #179fa5)
}

.translation-survey-response .close {
  margin: 16px
}

.translation-survey-response .content {
  width: 100%;
  background: transparent
}

.translation-survey-response .content .icon-success {
  display: block;
  border: 1px solid white;
  -webkit-border-radius: 38px;
  -moz-border-radius: 38px;
  -ms-border-radius: 38px;
  -o-border-radius: 38px;
  border-radius: 38px;
  width: 65px;
  height: 65px;
  margin: 40px auto 0
}

.translation-survey-response .content .icon-success:before {
  font-family: "LinkedIn-Glyphs-2.0.7", "LinkedIn-Glyphs";
  font-weight: normal;
  font-style: normal;
  text-decoration: inherit;
  speak: none;
  font-size: 20px;
  color: inherit;
  content: "\e00e"
}

.translation-survey-response .content .icon-success::before {
  position: absolute;
  top: 68px;
  margin-left: 7px;
  font-size: 50px;
  color: white
}

.translation-survey-response .content .headline {
  color: white;
  text-align: center;
  font-size: 22px;
  font-weight: 200;
  letter-spacing: 1.5px;
  padding-top: 18px
}

.translation-survey-response .content .body {
  min-height: 100px;
  width: 255px;
  margin: 6px auto;
  color: white;
  text-align: center;
  font-size: 15px;
  font-weight: 100;
  line-height: 19px;
  letter-spacing: 1.5px
}

.translation-voter-wrap {
  padding: 2px;
  overflow: hidden
}

.profile-section .translation-voter, .profile-section .translation-voter-response {
  margin-top: -75px;
  float: left;
  margin-bottom: 12px;
  margin-right: 12px;
  padding: 0 12px;
  box-shadow: 0px 0px 2px 1px rgba(0, 0, 0, 0.2);
  transition: margin-top .2s;
  font-size: 12px;
  line-height: 14px;
  color: #333;
  font-weight: normal
}

.profile-section .translation-voter.show, .profile-section .translation-voter-response.show {
  margin-top: 6px
}

.profile-section .translation-voter > span, .profile-section .translation-voter-response > span {
  display: inline-block;
  margin: 12px 12px 0 0
}

.profile-section .translation-voter .voter-form, .profile-section .translation-voter-response .voter-form {
  display: inline-block;
  margin: 0;
  color: #00a0dc
}

.profile-section .translation-voter .separator, .profile-section .translation-voter-response .separator {
  display: inline-block;
  padding: 0 6px;
  color: #828282;
  font-size: 10px
}

.profile-section .translation-voter .option, .profile-section .translation-voter-response .option {
  display: inline-block;
  padding: 12px 3px 12px 0;
  cursor: pointer
}

.profile-section .translation-voter .option:before, .profile-section .translation-voter-response .option:before {
  margin-right: 5px
}

.profile-section .translation-voter .option.positive:before, .profile-section .translation-voter-response .option.positive:before {
  font-family: "LinkedIn-Glyphs-2.0.7", "LinkedIn-Glyphs";
  font-weight: normal;
  font-style: normal;
  text-decoration: inherit;
  speak: none;
  font-size: 12px;
  color: #00a0dc;
  content: "\e00e"
}

.profile-section .translation-voter .option.positive:before, .profile-section .translation-voter-response .option.positive:before {
  position: relative;
  top: 1px
}

.profile-section .translation-voter .option.negative:before, .profile-section .translation-voter-response .option.negative:before {
  font-family: "LinkedIn-Glyphs-2.0.7", "LinkedIn-Glyphs";
  font-weight: normal;
  font-style: normal;
  text-decoration: inherit;
  speak: none;
  font-size: 12px;
  color: #00a0dc;
  content: "\e00f"
}

.profile-section .translation-voter .option.negative:before, .profile-section .translation-voter-response .option.negative:before {
  position: relative;
  top: 1px
}

.profile-section .translation-voter .option:hover, .profile-section .translation-voter-response .option:hover {
  color: #0077b5
}

.profile-section .translation-voter-response {
  padding: 12px;
  display: none
}

.profile-section .translation-voter-response.show {
  display: block
}

.profile-section .translation-voter-response.slideup {
  margin-top: -75px
}

#skills.profile-section .translation-voter-wrap {
  margin-left: 35px;
  margin-top: -25px
}

body.advocate-modal-visible {
  overflow: hidden
}

#advocate-modal {
  background-color: rgba(0, 0, 0, 0.5);
  display: none;
  position: fixed;
  top: 0;
  width: 100%;
  height: 100%;
  z-index: 2
}

#advocate-modal.show {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center
}

#advocate-modal.show-login .flipcard {
  transform: rotateY(180deg)
}

#advocate-modal .flipcard {
  transition: 0.6s;
  transform-style: preserve-3d;
  position: relative;
  width: 382px;
  height: 700px
}

#advocate-modal .login-form, #advocate-modal .register-form {
  backface-visibility: hidden;
  -webkit-backface-visibility: hidden;
  position: absolute;
  top: 0;
  left: 0;
  width: 382px;
  background: #fff;
  border-radius: 2px;
  box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.15);
  top: 60px
}

#advocate-modal .register-form {
  z-index: 2;
  transform: rotateY(0deg)
}

#advocate-modal .login-form {
  transform: rotateY(180deg)
}

#advocate-modal.no-animation.show-login .register-form {
  display: none
}

#advocate-modal.no-animation.show-reg .login-form {
  display: none
}

#advocate-modal.no-animation.show-login .flipcard {
  transform: none
}

#advocate-modal.no-animation .login-form, #advocate-modal.no-animation .register-form {
  position: static;
  top: 0
}

#advocate-modal.no-animation .register-form {
  transform: none
}

#advocate-modal.no-animation .login-form {
  transform: none
}

#advocate-modal .modal-va-fix {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center
}

#advocate-modal .modal-to-the-right {
  padding-left: 45%
}

#advocate-modal .modal-content {
  perspective: 1000px;
  background: transparent;
  font-family: "Source Sans Pro", "Helvetica Neue", Helvetica, Arial, sans-serif;
  margin: 0 auto;
  overflow: hidden;
  width: 382px
}

#advocate-modal .modal-content .modal-header {
  background: #f2f4f8;
  padding: 16px;
  position: relative
}

#advocate-modal .modal-content .modal-header button.modal-close {
  background-color: transparent;
  background-clip: content-box;
  border-width: 5px;
  border-radius: 50%;
  border-color: transparent;
  box-sizing: border-box;
  padding: 0;
  position: absolute;
  top: 0;
  right: 0;
  cursor: pointer;
  transition-duration: 167ms;
  transition-property: background-color, box-shadow, color;
  transition-timing-function: cubic-bezier(0, 0, 0.2, 1)
}

#advocate-modal .modal-content .modal-header button.modal-close:hover {
  background-color: rgba(0, 94, 147, 0.1);
  color: #0077b5
}

#advocate-modal .modal-content .modal-header button.modal-close::after {
  background-color: transparent;
  border-color: transparent;
  border-style: solid;
  border-width: 1000px;
  border-width: 100vh;
  content: "";
  position: absolute;
  width: 0;
  height: 0;
  top: 50%;
  left: 50%;
  z-index: -1;
  transform: translate(-50%, -50%);
  transition-timing-function: cubic-bezier(0, 0, 0.2, 1)
}

#advocate-modal .modal-content .modal-header button.modal-close .cancel-icon {
  display: inline-block;
  width: 16px;
  height: 16px;
  padding: 3px
}

#advocate-modal .modal-content .modal-header button.modal-close .a11y-text {
  border: 0;
  clip: rect(1px, 1px, 1px, 1px);
  height: 1px;
  overflow: hidden;
  padding: 0;
  position: absolute;
  width: 1px
}

#advocate-modal .modal-content .modal-header h2.modal-headline {
  color: rgba(0, 0, 0, 0.85);
  font-size: 26px;
  font-weight: 200;
  line-height: 32px;
  text-align: center
}

#advocate-modal .modal-content .modal-header h2.modal-headline strong {
  font-weight: 400
}

#advocate-modal .modal-content .modal-body {
  padding: 16px 24px
}

#advocate-modal .modal-content .modal-body #advocate-reg-form .form-errors,
#advocate-modal .modal-content .modal-body #advocate-login-form .form-errors {
  display: none;
  color: #FF0000;
  text-align: center;
  margin: 0 0 15px 0
}

#advocate-modal .modal-content .modal-body #advocate-reg-form .form-errors.show,
#advocate-modal .modal-content .modal-body #advocate-login-form .form-errors.show {
  display: block
}

#advocate-modal .modal-content .modal-body #advocate-reg-form label,
#advocate-modal .modal-content .modal-body #advocate-login-form label {
  color: rgba(0, 0, 0, 0.55);
  display: block;
  margin-bottom: 4px;
  font-size: 15px;
  font-weight: 400
}

#advocate-modal .modal-content .modal-body #advocate-reg-form input,
#advocate-modal .modal-content .modal-body #advocate-login-form input {
  background-color: transparent;
  border: 1px solid rgba(0, 0, 0, 0.25);
  border-radius: 2px;
  box-shadow: none;
  box-sizing: border-box;
  outline: 0;
  margin-bottom: 8px;
  padding: 0 10px;
  width: 100%;
  height: 32px;
  color: rgba(0, 0, 0, 0.85);
  font-size: 15px;
  font-weight: 400;
  line-height: 20px;
  transition: border-color 0.15s
}

#advocate-modal .modal-content .modal-body #advocate-reg-form .join-disclaimer,
#advocate-modal .modal-content .modal-body #advocate-reg-form .forgot-password,
#advocate-modal .modal-content .modal-body #advocate-login-form .join-disclaimer,
#advocate-modal .modal-content .modal-body #advocate-login-form .forgot-password {
  color: rgba(0, 0, 0, 0.55);
  font-family: "Source Sans Pro", "Helvetica Neue", Helvetica, Arial, sans-serif;
  font-size: 14px;
  font-weight: 400;
  line-height: 18px;
  margin: 10px 0;
  text-align: center
}

#advocate-modal .modal-content .modal-body #advocate-reg-form .forgot-password,
#advocate-modal .modal-content .modal-body #advocate-login-form .forgot-password {
  font-size: 16px;
  margin: 10px 0 0
}

#advocate-modal .modal-content .modal-body #advocate-reg-form button[type="submit"],
#advocate-modal .modal-content .modal-body #advocate-login-form button[type="submit"] {
  display: block;
  background: #008cc9;
  border: 0;
  border-radius: 2px;
  padding: 0 16px;
  color: #ffffff;
  font-weight: 400;
  letter-spacing: 0.025em;
  line-height: 32px;
  text-align: center;
  width: 100%;
  margin: 16px 0
}

#advocate-modal .modal-content .modal-body #advocate-login-form input {
  height: 46px;
  font-size: 17px;
  color: #838383
}

#advocate-modal .modal-content .modal-body #advocate-login-form button {
  height: 46px
}

#advocate-modal .modal-content .alt-action.login, #advocate-modal .modal-content .alt-action.sign-up {
  color: rgba(0, 0, 0, 0.85);
  font-family: "Source Sans Pro", "Helvetica Neue", Helvetica, Arial, sans-serif;
  font-size: 17px;
  font-weight: 400;
  line-height: 20px;
  text-align: center
}

#advocate-modal .modal-content .alt-action.login {
  margin-top: 16px
}

#advocate-modal .modal-content .modal-footer {
  background: #f2f4f8;
  padding: 15px 0
}

#advocate-modal .reg-option {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  color: #96999c;
  align-items: center;
  justify-content: center;
  font-size: 18px;
  margin: 16px 0
}

#advocate-modal .reg-option:before, #advocate-modal .reg-option:after {
  content: "";
  -webkit-box-flex: 1;
  -ms-flex-positive: 1;
  flex-grow: 1;
  height: 2px;
  background: #cccfd3
}

#advocate-modal .reg-option:before {
  margin-right: 10px
}

#advocate-modal .reg-option:after {
  margin-left: 10px
}

#advocate-modal .fb-btn {
  opacity: 1;
  font-weight: bold;
  border-width: 1px;
  border-style: solid;
  cursor: pointer;
  margin: 0;
  overflow: visible;
  text-decoration: none !important;
  text-align: center;
  width: auto;
  text-shadow: 0 1px 1px rgba(0, 0, 0, 0.35);
  -webkit-border-radius: 3px;
  -moz-border-radius: 3px;
  -ms-border-radius: 3px;
  -o-border-radius: 3px;
  border-radius: 3px;
  padding: 0 15px;
  height: 34px;
  line-height: 32px;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  font-size: 16px;
  color: #fff;
  background-color: #287bbc;
  border-color: #1b5480;
  filter: progid: DXImageTransform.Microsoft.gradient(gradientType=0, startColorstr='#FF287BBC', endColorstr='#FF23639A');
  background-image: -webkit-linear-gradient(top, #287bbc 0%, #23639a 100%);
  background-image: -moz-linear-gradient(top, #287bbc 0%, #23639a 100%);
  background-image: -o-linear-gradient(top, #287bbc 0%, #23639a 100%);
  background-image: linear-gradient(top, #287bbc 0%, #23639a 100%);
  white-space: nowrap;
  display: -moz-inline-stack;
  display: inline-block;
  vertical-align: middle;
  * vertical-align: auto;
  zoom: 1;
  * display: inline;
  vertical-align: middle;
  height: 32px;
  font-family: "Source Sans Pro", "Helvetica Neue", Helvetica, Arial, sans-serif;
  font-size: 15px;
  color: #FFFFFF;
  overflow: hidden;
  width: 100%;
  font-weight: normal;
  filter: progid: DXImageTransform.Microsoft.gradient(gradientType=0, startColorstr='#FF4065B4', endColorstr='#FF4065B4');
  background: #4065b4
}

#advocate-modal .fb-btn.hover, #advocate-modal .fb-btn:hover, #advocate-modal .fb-btn.focus,
#advocate-modal .fb-btn:focus {
  background-color: #2672ae;
  filter: progid: DXImageTransform.Microsoft.gradient(gradientType=0, startColorstr='#FF2672AE', endColorstr='#FF1E4F7E');
  background-image: -webkit-linear-gradient(top, #2672ae 0%, #1e4f7e 100%);
  background-image: -moz-linear-gradient(top, #2672ae 0%, #1e4f7e 100%);
  background-image: -o-linear-gradient(top, #2672ae 0%, #1e4f7e 100%);
  background-image: linear-gradient(top, #2672ae 0%, #1e4f7e 100%);
  -webkit-box-shadow: 0 1px 3px rgba(0, 0, 0, 0.25);
  -moz-box-shadow: 0 1px 3px rgba(0, 0, 0, 0.25);
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.25)
}

#advocate-modal .fb-btn.active, #advocate-modal .fb-btn:active {
  -webkit-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.25) inset;
  -moz-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.25) inset;
  box-shadow: 0 1px 2px rgba(0, 0, 0, 0.25) inset
}

#advocate-modal .fb-btn.disabled, #advocate-modal .fb-btn[disabled] {
  background-color: #2672ae;
  filter: progid: DXImageTransform.Microsoft.gradient(gradientType=0, startColorstr='#FF2672AE', endColorstr='#FF1E4F7E');
  background-image: -webkit-linear-gradient(top, #2672ae 0%, #1e4f7e 100%);
  background-image: -moz-linear-gradient(top, #2672ae 0%, #1e4f7e 100%);
  background-image: -o-linear-gradient(top, #2672ae 0%, #1e4f7e 100%);
  background-image: linear-gradient(top, #2672ae 0%, #1e4f7e 100%);
  -webkit-box-shadow: none;
  -moz-box-shadow: none;
  box-shadow: none;
  cursor: default;
  filter: progid: DXImageTransform.Microsoft.Alpha(Opacity=60);
  opacity: 0.6
}

#advocate-modal .fb-btn:hover, #advocate-modal .fb-btn:active, #advocate-modal .fb-btn:focus {
  filter: progid: DXImageTransform.Microsoft.gradient(gradientType=0, startColorstr='#FF3D61AC', endColorstr='#FF3D61AC');
  background: #3d61ac
}

#advocate-modal .fb-btn:before {
  content: "";
  display: block;
  width: 32px;
  height: 32px;
  float: left;
  margin-top: 6px;
  margin-left: -9px;
  background-position-x: 0
}

#advocate-modal .fb-btn.lazy-loaded:before {
  background: url('https://www.linkedin.com/sc/h/1m1qc7f6lphh5l2qjenc5jokb') no-repeat
}

#profinder-section {
  position: relative;
  text-align: center
}

#profinder-section a {
  text-decoration: none
}

#profinder-section .bg-gradient {
  background-color: #046293;
  background-image: linear-gradient(to right, #046293 0%, #66418c 105%);
  height: 76px;
  padding: 10px;
  text-align: left
}

#profinder-section .profinder-logo {
  text-align: left
}

#profinder-section .profinder-header {
  padding: 56px 16px 32px;
  position: relative
}

#profinder-section .profinder-header #pro-placeholder {
  left: 0;
  margin: 0 auto;
  position: absolute;
  right: 0;
  top: -33px
}

#profinder-section .profinder-footer {
  background: #f1f3f5;
  padding: 16px 0 38px 0
}

#profinder-section .headline {
  font-size: 22px;
  font-weight: normal;
  line-height: 24px;
  color: #434649
}

#profinder-section .cta {
  font-size: 16px;
  line-height: 20px;
  color: #333;
  font-weight: bold;
  color: #0077b5;
  display: block
}

#profinder-section .cta .go-glyph:after {
  font-family: "LinkedIn-Glyphs-2.0.7", "LinkedIn-Glyphs";
  font-weight: normal;
  font-style: normal;
  text-decoration: inherit;
  speak: none;
  font-size: 16px;
  color: inherit;
  content: "\e0ad"
}

#profinder-section .cta .go-glyph:after {
  padding-left: 5px;
  position: relative;
  top: 2px
}

#profinder-section .profinder-directory-container {
  bottom: 16px;
  left: 0;
  position: absolute;
  right: 0
}

#profinder-section .profinder-directory-container .directory-link {
  font-size: 13px;
  line-height: 17px;
  color: #006fa6;
  font-weight: normal;
  text-decoration: none;
  color: #96999c
}

#profinder-section .profinder-directory-container .directory-link.hover,
#profinder-section .profinder-directory-container .directory-link:hover,
#profinder-section .profinder-directory-container .directory-link.focus,
#profinder-section .profinder-directory-container .directory-link:focus {
  text-decoration: none
}

#profinder-section .profinder-directory-container .directory-link.visited,
#profinder-section .profinder-directory-container .directory-link:visited {
  color: #96999c
}

.profinder {
  background: #fff;
  box-shadow: 0 1px 1px rgba(0, 0, 0, 0.15), -1px 0 0 rgba(0, 0, 0, 0.03), 1px 0 0 rgba(0, 0, 0, 0.03), 0 1px 0 rgba(0, 0, 0, 0.12);
  font-family: "Source Sans Pro", "Helvetica Neue", Helvetica, Arial, sans-serif;
  color: rgba(0, 0, 0, 0.85);
  margin-bottom: 10px
}

.profinder__header {
  display: flex;
  position: relative;
  align-items: center;
  border-radius: 2px 2px 0 0;
  border-top: 4px solid #0077b5;
  padding: 16px 35px 0;
  text-transform: uppercase;
  letter-spacing: 3px
}

.header__link {
  color: rgba(0, 0, 0, 0.85);
  display: flex;
  align-items: center
}

.header__link:hover {
  text-decoration: none
}

.profinder__linkedin-bug {
  display: inline-block;
  width: 24px;
  height: 24px;
  background: url('https://www.linkedin.com/sc/h/ceypxoxgal85j55a83c9btywe');
  background-size: contain;
  margin-right: 8px
}

.profinder__headline {
  padding: 24px 35px 0;
  font-size: 26px;
  line-height: 32px;
  font-weight: 100;
  cursor: pointer
}

.profinder__subheadline {
  padding: 12px 35px 0;
  font-size: 16px;
  cursor: pointer
}

.profinder__cta {
  display: inline-block;
  margin: 12px 35px 0;
  padding: 8px 16px
}

.services {
  padding: 24px 35px 24px;
  font-family: "Source Sans Pro", "Helvetica Neue", Helvetica, Arial, sans-serif;
  color: rgba(0, 0, 0, 0.55);
  font-size: 13px;
  line-height: 16px
}

.services__list-item {
  display: inline-block;
  margin-right: 12px
}

.profinder__hovercard-container {
  position: absolute;
  top: 16px;
  right: 36px
}

.profinder__question-pebble {
  display: inline-block;
  width: 16px;
  height: 16px;
  background: url('https://www.linkedin.com/sc/h/aqy285yda0qzm371dn9qbg77e');
  background-size: contain;
  cursor: pointer
}

.profinder__hovercard {
  width: 325px;
  font-size: 15px;
  text-transform: none;
  letter-spacing: normal
}

.proprofinder_see-recommendations-link {
  cursor: pointer;
  color: #006fa6
}

.proprofinder_see-recommendations-link:visited, .proprofinder_see-recommendations-link:active,
.proprofinder_see-recommendations-link:focus {
  color: #006fa6
}

#feed.single-section .activities, #feed.single-section .posts {
  width: 100%;
  padding: 0 25px 25px
}

#feed.single-section .post:first-child {
  margin-right: 25px
}

#feed.single-section .activity {
  display: inline-block;
  vertical-align: top
}

#feed.single-section .activity:nth-child(even) {
  margin-left: 25px
}

#feed.single-section .activities .see-more-link {
  width: 50%;
  float: right;
  margin: 0 -12.5px 0 0
}

#feed .title {
  padding: 25px 25px 20px
}

#feed .activities, #feed .posts {
  display: inline-block;
  vertical-align: top;
  width: 50%;
  box-sizing: border-box
}

#feed .activities {
  padding: 0 25px 25px 12.5px
}

#feed .posts {
  padding: 0 12.5px 25px 25px
}

#feed .item-title {
  font-size: 14px;
  font-weight: bold;
  line-height: 16px;
  color: #000;
  line-height: 18px
}

#feed .item-title a {
  font-size: 14px;
  font-weight: bold;
  line-height: 16px;
  color: #000;
  text-decoration: none
}

#feed .item-title a.hover, #feed .item-title a:hover, #feed .item-title a.focus,
#feed .item-title a:focus {
  text-decoration: none;
  color: #006fa6;
  cursor: pointer
}

.ie #feed .item-title a.hover, .ie #feed .item-title a:hover, .ie #feed .item-title a.focus,
.ie #feed .item-title a:focus {
  cursor: hand
}

#feed .item-title a:visited {
  font-size: 14px;
  font-weight: bold;
  line-height: 16px;
  color: #000;
  text-decoration: none
}

#feed .item-title a:visited.hover, #feed .item-title a:visited:hover,
#feed .item-title a:visited.focus, #feed .item-title a:visited:focus {
  text-decoration: none;
  color: #006fa6;
  cursor: pointer
}

.ie #feed .item-title a:visited.hover, .ie #feed .item-title a:visited:hover,
.ie #feed .item-title a:visited.focus, .ie #feed .item-title a:visited:focus {
  cursor: hand
}

#feed .see-more-link {
  display: block;
  padding: 0;
  margin-top: 20px
}

#feed .see-more-link a {
  display: block;
  font-size: 16px;
  font-weight: bold;
  line-height: 18px;
  color: #006fa6;
  text-decoration: none;
  color: #1A84BC
}

#feed .see-more-link a.hover, #feed .see-more-link a:hover, #feed .see-more-link a.focus,
#feed .see-more-link a:focus {
  text-decoration: underline
}

#feed .see-more-link a.visited, #feed .see-more-link a:visited {
  color: #96999c
}

#feed .see-more-link a:visited {
  color: #1A84BC
}

#feed .item-subtitle, #feed .time {
  font-size: 13px;
  line-height: 17px;
  color: #66696a;
  font-weight: normal
}

#feed .post, #feed .activity {
  padding: 0
}

#feed .activity {
  border: 0;
  margin-bottom: 25px;
  min-height: 48.75px
}

#feed .activity:last-of-type {
  margin-bottom: 0
}

#feed .activity .image-container {
  display: inline-block;
  vertical-align: middle;
  text-align: center;
  position: relative;
  width: 48px;
  height: 48px;
  line-height: 48px
}

#feed .activity img {
  display: inline-block;
  vertical-align: middle;
  height: 100%;
  width: 100%;
  object-fit: cover;
  border-radius: 2px
}

#feed .activity .content {
  display: inline-block;
  vertical-align: top;
  margin-left: 10px;
  width: 227px
}

#feed .activity .play-icon {
  position: absolute;
  top: calc(100% * 8 / 48);
  left: calc(100% * 8 / 48);
  display: inline-block;
  width: 32px;
  height: 32px
}

#feed .activity .item-title, #feed .activity .item-subtitle {
  margin-bottom: 2px
}

#feed .post {
  border: 1px solid #e5e5e5;
  padding-bottom: 15px;
  width: 283px;
  display: inline-block
}

#feed .post .image-container {
  display: block;
  height: 120px;
  margin-bottom: 10px;
  position: relative
}

#feed .post img {
  width: 100%;
  margin-bottom: 10px;
  position: absolute;
  clip: rect(0px, 285px, 120px, 0px)
}

#feed .post .item-title, #feed .post .item-subtitle, #feed .post .time {
  padding: 0 12px;
  margin-bottom: 2px
}

#feed .post .item-title:last-of-type, #feed .post .item-subtitle:last-of-type,
#feed .post .time:last-of-type {
  margin-bottom: 0
}

#feed.expanded-feed .expanding-wrapper, #feed.expanded-feed#posts .expanding-wrapper,
#feed.expanded-feed#activities .expanding-wrapper {
  position: relative;
  width: 100%;
  min-height: 0;
  max-height: 0;
  height: 0;
  overflow: hidden;
  transition: max-height 1s ease;
  padding: 0px 1px
}

#feed.expanded-feed#posts .item-title, #feed.expanded-feed#posts .item-title a,
#feed.expanded-feed#activities .item-title, #feed.expanded-feed#activities .item-title a {
  font-size: 16px;
  font-weight: bold;
  line-height: 18px;
  color: #000;
  color: rgba(0, 0, 0, 0.85);
  line-height: 20px
}

#feed.expanded-feed#posts .time, #feed.expanded-feed#posts .item-content,
#feed.expanded-feed#activities .time, #feed.expanded-feed#activities .item-content {
  font-size: 13px;
  line-height: 17px;
  color: #66696a;
  font-weight: normal;
  color: rgba(0, 0, 0, 0.55);
  font-size: 14px;
  line-height: 18px
}

#feed.expanded-feed#posts .item-title a, #feed.expanded-feed#activities .item-title a {
  text-decoration: none
}

#feed.expanded-feed#posts .item-title a.hover, #feed.expanded-feed#posts .item-title a:hover,
#feed.expanded-feed#posts .item-title a.focus, #feed.expanded-feed#posts .item-title a:focus,
#feed.expanded-feed#activities .item-title a.hover, #feed.expanded-feed#activities .item-title a:hover,
#feed.expanded-feed#activities .item-title a.focus, #feed.expanded-feed#activities .item-title a:focus {
  text-decoration: none;
  color: #006fa6;
  cursor: pointer
}

.ie #feed.expanded-feed#posts .item-title a.hover, .ie #feed.expanded-feed#posts .item-title a:hover,
.ie #feed.expanded-feed#posts .item-title a.focus, .ie #feed.expanded-feed#posts .item-title a:focus,
.ie #feed.expanded-feed#activities .item-title a.hover, .ie #feed.expanded-feed#activities .item-title a:hover,
.ie #feed.expanded-feed#activities .item-title a.focus, .ie #feed.expanded-feed#activities .item-title a:focus {
  cursor: hand
}

#feed.expanded-feed#posts .item-title a:visited, #feed.expanded-feed#activities .item-title a:visited {
  text-decoration: none
}

#feed.expanded-feed#posts .item-title a:visited.hover, #feed.expanded-feed#posts .item-title a:visited:hover,
#feed.expanded-feed#posts .item-title a:visited.focus, #feed.expanded-feed#posts .item-title a:visited:focus,
#feed.expanded-feed#activities .item-title a:visited.hover, #feed.expanded-feed#activities .item-title a:visited:hover,
#feed.expanded-feed#activities .item-title a:visited.focus, #feed.expanded-feed#activities .item-title a:visited:focus {
  text-decoration: none;
  color: #006fa6;
  cursor: pointer
}

.ie #feed.expanded-feed#posts .item-title a:visited.hover, .ie #feed.expanded-feed#posts .item-title a:visited:hover,
.ie #feed.expanded-feed#posts .item-title a:visited.focus, .ie #feed.expanded-feed#posts .item-title a:visited:focus,
.ie #feed.expanded-feed#activities .item-title a:visited.hover, .ie #feed.expanded-feed#activities .item-title a:visited:hover,
.ie #feed.expanded-feed#activities .item-title a:visited.focus, .ie #feed.expanded-feed#activities .item-title a:visited:focus {
  cursor: hand
}

#feed.expanded-feed .post, #feed.expanded-feed#posts .post {
  border: 1px solid #F1F3F5;
  padding-bottom: 0px;
  border-radius: 2px;
  margin-bottom: 16px;
  background: white
}

#feed.expanded-feed .post .image-container, #feed.expanded-feed#posts .post .image-container {
  margin-bottom: 12px
}

#feed.expanded-feed .post .item-title, #feed.expanded-feed#posts .post .item-title {
  margin-bottom: 2px
}

#feed.expanded-feed .activity, #feed.expanded-feed#activities .activity {
  border: 1px solid #f1f3f5;
  border-radius: 2px;
  margin-bottom: 16px
}

#feed.expanded-feed .activity .image-and-title-container, #feed.expanded-feed#activities .activity .image-and-title-container {
  display: flex;
  align-items: center
}

#feed.expanded-feed .activity .image-and-title-container .image-container,
#feed.expanded-feed#activities .activity .image-and-title-container .image-container {
  flex-shrink: 1
}

#feed.expanded-feed .activity .image-and-title-container .image-container img.profile-img,
#feed.expanded-feed#activities .activity .image-and-title-container .image-container img.profile-img {
  background-clip: content-box;
  border: 1px solid transparent;
  border-radius: 49.9%
}

#feed.expanded-feed .activity .image-and-title-container .item-title,
#feed.expanded-feed#activities .activity .image-and-title-container .item-title {
  flex-shrink: 2
}

#feed.expanded-feed .activity .item-subtitle, #feed.expanded-feed#activities .activity .item-subtitle {
  padding: 6px 12px 4px 12px;
  margin-bottom: 0px;
  font-size: 14px;
  line-height: 20px;
  color: rgba(0, 0, 0, 0.85);
  border-bottom: 1px solid #f1f3f5;
  border-radius: 2px
}

#feed.expanded-feed .see-more-feed-action {
  display: flex;
  justify-content: center;
  padding: 15px 0px;
  border-top: 1px solid rgba(0, 0, 0, 0.1)
}

#feed.expanded-feed .see-all-link a {
  color: #1A84BC
}

#feed.expanded-feed .see-all-link a:visited {
  color: #1A84BC
}

#feed.expanded-feed .see-more-feed-action, #feed.expanded-feed .see-all-link {
  font-size: 16px;
  font-weight: bold;
  line-height: 18px;
  color: #000;
  color: #1A84BC;
  cursor: pointer;
  background: white
}

#feed.expanded-feed .see-more-feed-action .chevron-down-icon, #feed.expanded-feed .see-all-link .chevron-down-icon {
  background: url('https://www.linkedin.com/sc/h/3pugrkqj9uau6dzwdxobv44g7') center center no-repeat;
  -webkit-background-size: 16px;
  -moz-background-size: 16px;
  -o-background-size: 16px;
  background-size: 16px;
  height: 16px;
  width: 16px;
  margin-left: 10px;
  margin-top: 1px;
  cursor: pointer
}

#feed.expanded-feed .title {
  padding: 25px 25px 12px
}

#feed.expanded-feed #activities, #feed.expanded-feed #posts {
  display: inline-block;
  vertical-align: top;
  width: 50%;
  box-sizing: border-box;
  padding: 0 25px 12px 12.5px
}

#feed.expanded-feed #activities .feed-items, #feed.expanded-feed #posts .feed-items {
  padding: 0
}

#feed.expanded-feed #activities .expanding-wrapper, #feed.expanded-feed #posts .expanding-wrapper {
  min-height: 0px;
  max-height: 275px;
  height: 100%;
  padding: 1px 2px
}

#feed.expanded-feed.single-section #activities, #feed.expanded-feed.single-section #posts {
  width: 100%;
  padding: 0 25px 25px 25px
}

#feed.expanded-feed.single-section .activity-wrapper .activity:nth-child(even) {
  margin-left: 0
}

#feed.expanded-feed.single-section .activity-wrapper .feed-items:nth-child(even) {
  margin-left: 25px
}

#feed.expanded-feed.single-section #activities .expanding-wrapper {
  padding: 1px 0px;
  margin-right: -2px
}

#feed.expanded-feed .activity-wrapper {
  display: flex
}

#feed.expanded-feed .item-content {
  color: rgba(0, 0, 0, 0.55);
  font-size: 13px;
  line-height: 17px;
  padding: 4px 12px 8px
}

#feed.expanded-feed #posts {
  padding-left: 25px;
  padding-right: 0
}

#feed.expanded-feed .post {
  margin-bottom: 10px;
  padding-bottom: 8px
}

#feed.expanded-feed .post .image-container {
  height: 120px
}

#feed.expanded-feed .post img {
  clip: rect(0px, 286px, 120px, 0px);
  height: initial
}

#feed.expanded-feed .activity {
  width: 285px;
  margin-bottom: 16px
}

#feed.expanded-feed .activity .item-title {
  margin-bottom: 0;
  padding: 8px 12px 8px 0px;
  overflow: hidden;
  text-overflow: ellipsis
}

#feed.expanded-feed .activity .item-subtitle {
  font-size: 13px;
  line-height: 17px;
  color: #333;
  font-weight: normal
}

#feed.expanded-feed .activity .image-container {
  margin: 8px 8px 8px 12px;
  height: 48px;
  width: 48px;
  min-width: 48px;
  min-height: 48px
}

#feed.expanded-feed .activity .image-container img.profile-img {
  width: 48px;
  height: 48px;
  max-width: 48px;
  max-height: 48px
}

#feed.expanded-feed .more-posts, #feed.expanded-feed .more-activities {
  padding: 1px 0 0
}

#feed.expanded-feed .see-all-link {
  padding: 0;
  display: block;
  margin-left: 2px;
  margin-bottom: 5px;
  font-size: 14px;
  font-weight: bold;
  line-height: 16px;
  color: #000
}

#feed.expanded-feed #see-more-feed-checkbox {
  display: none
}

#feed.expanded-feed #see-more-feed-checkbox:not(:checked) ~ #posts,
#feed.expanded-feed #see-more-feed-checkbox:not(:checked) ~ #activities {
  position: relative
}

#feed.expanded-feed #see-more-feed-checkbox:checked ~ #posts .expanding-wrapper,
#feed.expanded-feed #see-more-feed-checkbox:checked ~ #activities .expanding-wrapper {
  max-height: 1040px;
  height: 100%
}

#feed.expanded-feed #see-more-feed-checkbox:checked ~ .see-more-feed-wrapper {
  display: none
}

#feed.expanded-feed .see-more-feed-action {
  padding-bottom: 0
}

#feed.expanded-feed .see-more-feed-wrapper {
  position: relative;
  padding-bottom: 15px
}

#feed.expanded-feed .see-more-feed-wrapper:before {
  background: linear-gradient(to bottom, rgba(255, 255, 255, 0) 0%, #ffffff 85%, #ffffff 100%);
  height: 70px;
  width: 100%;
  z-index: 1;
  content: "";
  position: absolute;
  top: -70px
}

#feed.instructor-feed.expanded-feed .feed-content {
  display: flex;
  padding: 0 25px 12px
}

#feed.instructor-feed.expanded-feed .feed-column {
  flex-grow: 1;
  display: flex;
  flex-direction: column
}

#feed.instructor-feed.expanded-feed .feed-column:first-child {
  margin-right: 25px
}

#feed.instructor-feed.expanded-feed .instructor-course {
  display: inline-block;
  padding-bottom: 8px;
  margin-bottom: 10px;
  border: 1px solid #F1F3F5;
  border-radius: 2px;
  background: white;
  width: 283px;
  min-height: 135px
}

#feed.instructor-feed.expanded-feed .instructor-course .image-container {
  height: 120px;
  margin-bottom: 12px;
  display: block;
  position: relative
}

#feed.instructor-feed.expanded-feed .instructor-course img {
  width: 100%;
  margin-bottom: 10px;
  position: absolute;
  clip: rect(0px, 286px, 120px, 0px);
  height: initial
}

#feed.instructor-feed.expanded-feed .instructor-course .item-title {
  padding: 0 12px;
  margin-top: 5px;
  margin-bottom: 2px;
  font-size: 16px;
  font-weight: bold;
  line-height: 18px;
  color: black
}

#feed.instructor-feed.expanded-feed .instructor-course .time {
  font-size: 12px;
  line-height: 14px;
  color: #66696a;
  padding: 0 12px;
  margin-top: 3px;
  margin-bottom: 0px
}

#feed.instructor-feed.expanded-feed .feed-items {
  display: flex;
  width: 100%;
  justify-content: space-between;
  height: 100%
}

#feed.instructor-feed.expanded-feed #posts, #feed.instructor-feed.expanded-feed #activities {
  width: 100%;
  padding: 0
}

#feed.instructor-feed.expanded-feed .expanding-content-wrapper {
  overflow: hidden;
  max-height: 270px;
  transition: max-height 1s ease
}

#feed.instructor-feed.expanded-feed #see-more-feed-checkbox ~ .feed-content .see-all-link {
  display: none
}

#feed.instructor-feed.expanded-feed #see-more-feed-checkbox:checked ~ .feed-content .see-all-link {
  display: block
}

#feed.instructor-feed.expanded-feed #see-more-feed-checkbox:checked ~ .feed-content.expanding-content-wrapper {
  max-height: 1000px;
  height: 100%;
  transition: max-height 1s ease
}

#feed.instructor-feed.single-section .feed-column:first-child {
  margin-right: 0
}

#feed.instructor-feed.single-section .instructor-course:first-child {
  margin-right: 25px
}

#join-balloon-anchor {
  display: none;
  margin: 0 auto;
  position: relative;
  top: 41px;
  width: 974px;
  z-index: 2
}

#join-balloon-anchor.show {
  display: block
}

#join-balloon {
  display: block;
  position: absolute;
  top: 8px;
  right: 0;
  width: 280px;
  background: white;
  border-radius: 4px;
  box-shadow: 0 0 5px rgba(0, 0, 0, 0.25);
  text-align: center;
  font-family: "Source Sans Pro", "Helvetica Neue", Helvetica, Arial, sans-serif
}

#join-balloon::before {
  content: '';
  display: block;
  position: absolute;
  top: -6px;
  width: 0;
  height: 0;
  border-bottom: 7px solid transparent;
  border-right: 7px solid transparent;
  border-left: 7px solid transparent;
  transition-property: all;
  transition-duration: 250ms;
  transition-timing-function: cubic-bezier(0, 1, 0.5, 1)
}

#join-balloon.login-visible::before {
  border-bottom-color: white;
  right: 22px
}

#join-balloon.reg-visible::before {
  border-bottom-color: #0096B4;
  right: 94px
}

#join-balloon .pane {
  max-height: 0;
  overflow: hidden
}

#join-balloon .pane.active {
  max-height: 1000px
}

#join-balloon .pane button, #join-balloon .pane a.button {
  display: block;
  font-family: "Source Sans Pro", "Helvetica Neue", Helvetica, Arial, sans-serif;
  font-size: 16px;
  font-weight: 600;
  padding: 10px;
  width: 100%
}

#join-balloon .pane .join-cta {
  color: white;
  margin-bottom: 16px
}

#join-balloon .pane .join-cta h1 {
  font-size: 20px;
  font-weight: bold;
  margin-bottom: 8px
}

#join-balloon .pane .join-cta h2 {
  font-size: 16px
}

#join-balloon .pane .pane-header {
  padding: 16px 0
}

#join-balloon .pane .pane-body {
  margin: 0 16px
}

#join-balloon .pane .pane-body form .input-fields {
  margin-bottom: 12px
}

#join-balloon .pane .pane-body form .input-fields input {
  background-color: white;
  border: 1px solid rgba(0, 0, 0, 0.15);
  border-bottom: none;
  box-shadow: none;
  box-sizing: border-box;
  outline: 0;
  margin: 0;
  padding: 14px;
  width: 100%;
  color: rgba(0, 0, 0, 0.85);
  font-family: "Source Sans Pro", "Helvetica Neue", Helvetica, Arial, sans-serif;
  font-size: 16px
}

#join-balloon .pane .pane-body form .input-fields input:first-child {
  border-top-left-radius: 2px;
  border-top-right-radius: 2px
}

#join-balloon .pane .pane-body form .input-fields input:last-child {
  border-bottom: 1px solid rgba(0, 0, 0, 0.15);
  border-bottom-left-radius: 2px;
  border-bottom-right-radius: 2px
}

#join-balloon .pane .pane-body form.reg-form .form-errors {
  display: none;
  color: #FF0000;
  text-align: center;
  margin: 0 0 15px 0
}

#join-balloon .pane .pane-body form.reg-form .form-errors.show {
  display: block
}

#join-balloon .pane .pane-body .forgot-password {
  display: block;
  margin: 8px
}

#join-balloon .pane .pane-body .forgot-password .forgot-password-link {
  font-size: 14px;
  color: #008cc9
}

#join-balloon #login-pane .pane-header {
  color: #505050;
  font-size: 15px
}

#join-balloon #login-pane .alt-action {
  background-color: #00a0dc;
  box-sizing: border-box;
  border-bottom-left-radius: 2px;
  border-bottom-right-radius: 2px;
  padding: 16px;
  width: 100%;
  overflow: hidden;
  max-height: none;
  transition-property: all;
  transition-duration: 1s;
  transition-timing-function: cubic-bezier(0, 1, 0.5, 1)
}

#join-balloon #login-pane .alt-action.closed {
  max-height: 0;
  padding: 0
}

#join-balloon #login-pane .alt-action .join-btn {
  font-weight: bold
}

#join-balloon #reg-pane .pane-header {
  background: linear-gradient(to right, #008cc9, #219aa0);
  border-top-left-radius: 2px;
  border-top-right-radius: 2px;
  padding-bottom: 67px
}

#join-balloon #reg-pane .pane-header .join-cta {
  margin: 0
}

#join-balloon #reg-pane .pane-body {
  margin-top: -51px
}

#join-balloon #reg-pane .pane-body form > * {
  margin-bottom: 12px
}

#join-balloon #reg-pane .pane-body .join-disclaimer {
  color: rgba(0, 0, 0, 0.55);
  font-family: "Source Sans Pro", "Helvetica Neue", Helvetica, Arial, sans-serif;
  font-size: 11px;
  font-weight: 400;
  line-height: 16px;
  text-align: center
}

#join-balloon #reg-pane .alt-action {
  color: #434649;
  font-size: 13px;
  font-weight: bold;
  line-height: 19px;
  margin-bottom: 12px
}

.course-recommendations {
  padding: 20px
}

.course-recommendations a {
  text-decoration: none
}

.course-recommendations a:visited {
  color: #000
}

.course-recommendations a:hover {
  color: #006fa6
}

.course-recommendations__header {
  padding: 0px
}

.course-recommendations__header-link {
  font-size: 14px;
  font-weight: bold;
  line-height: 16px;
  color: #000;
  text-decoration: none
}

.course-recommendations__header-link.hover, .course-recommendations__header-link:hover,
.course-recommendations__header-link.focus, .course-recommendations__header-link:focus {
  text-decoration: none;
  color: #006fa6;
  cursor: pointer
}

.ie .course-recommendations__header-link.hover, .ie .course-recommendations__header-link:hover,
.ie .course-recommendations__header-link.focus, .ie .course-recommendations__header-link:focus {
  cursor: hand
}

.course-recommendations__course-title {
  margin-left: 110px
}

.course-recommendations__course-title-link {
  font-size: 13px;
  font-weight: bold;
  line-height: 17px;
  color: #000;
  text-decoration: none
}

.course-recommendations__course-title-link.hover, .course-recommendations__course-title-link:hover,
.course-recommendations__course-title-link.focus, .course-recommendations__course-title-link:focus {
  text-decoration: none;
  color: #006fa6;
  cursor: pointer
}

.ie .course-recommendations__course-title-link.hover, .ie .course-recommendations__course-title-link:hover,
.ie .course-recommendations__course-title-link.focus, .ie .course-recommendations__course-title-link:focus {
  cursor: hand
}

.course-recommendations__count {
  font-size: 13px;
  line-height: 17px;
  color: #66696a;
  font-weight: normal;
  margin-left: 110px
}

.course-recommendations__img-link {
  float: left;
  position: relative;
  padding-left: 0;
  padding-right: 10px;
  height: 60px;
  width: 100px;
  text-decoration: none
}

.course-recommendations__img-link:before {
  font-family: "LinkedIn-Glyphs-2.0.7", "LinkedIn-Glyphs";
  font-weight: normal;
  font-style: normal;
  text-decoration: inherit;
  speak: none;
  font-size: 32px;
  color: #fff;
  content: "\e077"
}

.course-recommendations__img-link .no-image {
  height: inherit;
  width: inherit;
  background: #cccfd3
}

.course-recommendations__img-link:before {
  position: absolute;
  top: 14px;
  left: 34px;
  z-index: 1;
  background: rgba(0, 0, 0, 0.7);
  border-radius: 50%;
  line-height: 1
}

.course-recommendations__items {
  padding-top: 10px
}

.course-recommendations__items .course-recommendations__item {
  text-align: initial;
  padding: 10px 0;
  overflow: hidden
}

.course-recommendations__items .course-recommendations__item:last-child {
  border-bottom: 1px solid #ddd
}

.course-recommendations__img {
  width: 100px;
  height: 60px
}

.course-recommendations__view-all {
  padding-top: 20px;
  padding-bottom: 2px;
  display: block;
  text-align: right
}

.course-recommendations__view-all-link {
  font-size: 13px;
  line-height: 17px;
  color: #006fa6;
  font-weight: normal;
  text-decoration: none
}

.course-recommendations__view-all-link.hover, .course-recommendations__view-all-link:hover,
.course-recommendations__view-all-link.focus, .course-recommendations__view-all-link:focus {
  text-decoration: underline
}

.course-recommendations__icon:after {
  font-family: "LinkedIn-Glyphs-2.0.7", "LinkedIn-Glyphs";
  font-weight: normal;
  font-style: normal;
  text-decoration: inherit;
  speak: none;
  font-size: 19px;
  color: #0077b5;
  content: "\e029"
}

.course-recommendations__icon:after {
  vertical-align: middle
}

#courses.profile-section .courses-list .course:before {
  content: "\2022";
  padding-right: 6px
}

#captcha-dialog {
  position: fixed;
  width: 600px;
  top: 75px;
  margin: 0 auto;
  left: 0;
  right: 0;
  z-index: 5
}

#captcha-dialog.hide {
  display: none
}

#captcha-dialog:before {
  content: " ";
  background: rgba(0, 0, 0, 0.5);
  position: fixed;
  left: 0;
  top: 0;
  height: 100%;
  width: 100%;
  z-index: 10
}

#captcha-dialog .a11y-hidden {
  position: absolute !important;
  height: 1px;
  width: 1px;
  overflow: hidden;
  clip: rect(1px, 1px, 1px, 1px)
}

#captcha-dialog .title, #captcha-dialog iframe, #captcha-dialog .close {
  position: relative;
  z-index: 11
}

#captcha-dialog iframe {
  width: 600px;
  height: 410px
}

#captcha-dialog .title {
  background: #333;
  box-shadow: 0 1px 1px rgba(0, 0, 0, 0.15), -1px 0 0 rgba(0, 0, 0, 0.03), 1px 0 0 rgba(0, 0, 0, 0.03), 0 1px 0 rgba(0, 0, 0, 0.12);
  padding: 8px 12px;
  border: 1px solid #939393;
  border-width: 1px 1px 0 1px;
  font-size: 16px;
  line-height: 16px;
  font-size: 14px;
  font-weight: normal;
  line-height: 16px;
  color: #cccfd3
}

#captcha-dialog .close {
  color: #fff;
  background: transparent none;
  padding: 0 1px 0 0;
  border: 0;
  margin: 0 1px 0 0;
  cursor: pointer;
  text-decoration: none;
  position: absolute;
  overflow: hidden;
  top: 13px;
  right: 10px;
  width: 13px;
  height: 13px;
  text-indent: 14px;
  opacity: 0.7;
  top: 10px
}

#captcha-dialog .close:before {
  font-family: "LinkedIn-Glyphs-2.0.7", "LinkedIn-Glyphs";
  font-weight: normal;
  font-style: normal;
  text-decoration: inherit;
  speak: none;
  font-size: 13px;
  color: inherit;
  content: "\e00f";
  vertical-align: top;
  line-height: 1;
  position: absolute;
  top: 0;
  right: 0;
  text-decoration: none;
  cursor: pointer
}

#education.profile-section .item-title {
  margin-right: 100px;
  display: block
}

.services-modal__overlay {
  position: fixed;
  display: none;
  align-items: center;
  justify-content: space-around;
  top: 0;
  left: 0;
  width: 100vw;
  height: 100vh;
  z-index: 2;
  background: rgba(0, 0, 0, 0.5)
}

.services-modal__overlay.show {
  display: flex
}

.services-modal {
  position: relative;
  width: 456px;
  background: white
}

.services-modal .close-btn {
  display: inline-block;
  float: right;
  margin: 3px 0 0 10px;
  cursor: pointer
}

.services-modal .header {
  background-color: #f3f6f8;
  border-bottom: 1px solid #cdcfd2;
  padding: 20px 24px;
  text-align: center
}

.services-modal .header .setting-title {
  line-height: 28px;
  font-weight: 400;
  color: rgba(0, 0, 0, 0.7);
  font-size: 21px
}

.services-modal .services-form {
  padding: 24px
}

.services-modal .form-el-group {
  margin-top: 12px
}

.services-modal .form-el-group .form-el {
  border-bottom: 1px solid #e6e9ec
}

.services-modal .form-el-group .form-el:first-child {
  border-top: 1px solid #e6e9ec
}

.services-modal .options-legend {
  line-height: 24px;
  font-weight: 600;
  color: rgba(0, 0, 0, 0.85);
  font-size: 17px
}

.services-modal .input-label {
  display: inline-block;
  width: 300px;
  padding: 12px;
  font-weight: 400;
  color: rgba(0, 0, 0, 0.7);
  font-size: 15px
}

.services-modal .submit {
  display: block;
  width: 100%;
  padding: 8px 16px
}

.services-modal .error-text {
  font-size: 13px;
  color: #ff2c33;
  display: none;
  margin-top: 8px
}

.services-modal .form-query {
  padding-bottom: 16px;
  border: none
}

.services-modal__overlay.invalid .error-text {
  display: block
}

.badge-preview {
  border-radius: 2px;
  box-shadow: 0 0 2px rgba(0, 0, 0, 0.24);
  margin-bottom: 20px
}

.badge-preview a:hover {
  text-decoration: none
}

.badge-preview .badge-preview__container {
  padding: 15px
}

.badge-preview .badge-preview__header {
  display: flex;
  margin-bottom: 20px
}

.badge-preview .badge-preview__header .badge-preview__profile-pic {
  width: 50px;
  height: 50px;
  margin: 6px 10px auto 0;
  border-radius: 50%
}

.badge-preview .badge-preview__header .badge-preview__name {
  font-weight: bold;
  font-size: 16px;
  line-height: 20px;
  color: rgba(0, 0, 0, 0.7)
}

.badge-preview .badge-preview__header .badge-preview__headline {
  font-size: 13px;
  padding-top: 5px
}

.badge-preview .badge-preview__position-list {
  margin-bottom: 15px;
  font-size: 13px;
  line-height: 17px
}

.badge-preview .badge-preview__position-list .logo {
  float: left;
  width: inherit
}

.badge-preview .badge-preview__position-list .badge-preview__position-item {
  display: flex;
  align-items: center;
  margin-bottom: 10px
}

.badge-preview .badge-preview__position-list .badge-preview__logo {
  width: 16px;
  height: 16px;
  margin-right: 10px;
  vertical-align: middle
}

.badge-preview .badge-preview__position-list .badge-preview__company,
.badge-preview .badge-preview__position-list .badge-preview__school {
  color: rgba(0, 0, 0, 0.55)
}

.badge-preview .badge-preview__buttons {
  display: flex;
  justify-content: space-between;
  align-items: center
}

.badge-preview .badge-preview__buttons .profile-badge-cta {
  background-color: transparent;
  border: 1px solid #008cc9;
  border-radius: 2px;
  box-sizing: border-box;
  color: #008cc9;
  display: flex;
  font-size: 13px;
  font-weight: bold;
  height: 31px;
  line-height: 31px;
  margin: 0;
  overflow: visible;
  padding: 0 13px;
  text-align: center;
  vertical-align: middle;
  white-space: nowrap;
  zoom: 1
}
</style>
  <div id="application-body">
    <main id="layout-main" role="main">
      <div id="wrapper">
        <div id="profile">
          <section id="topcard" class="profile-section">
            <div class="profile-card vcard">
              <div class="profile-picture" data-section="picture">
                <a href="http://www.kmanikumarreddy.com">
                  <img class="image profile-img" src="data:image/png;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wBDAAMCAgMCAgMDAwMEAwMEBQgFBQQEBQoHBwYIDAoMDAsK
                  CwsNDhIQDQ4RDgsLEBYQERMUFRUVDA8XGBYUGBIUFRT/2wBDAQMEBAUEBQkFBQkUDQsNFBQUFBQU
                  FBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBT/wAARCADIAMgDASIA
                  AhEBAxEB/8QAHgAAAgIDAQEBAQAAAAAAAAAABgcFCAAECQMCAQr/xAA9EAABAwMCBAQFAgQGAgEF
                  AAABAgMEAAURBiEHEjFBEyJRYQgUMnGBQpEVI1KhFiRiscHRCUMzFyU0cpL/xAAcAQABBQEBAQAA
                  AAAAAAAAAAAFAgMEBgcBAAj/xAAyEQABBAEDAgQEBQQDAAAAAAABAAIDBBEFEiETMQYiQVEUYXGh
                  FTKRscEHIzPRUuHw/9oADAMBAAIRAxEAPwBPxeADd9cbZEbKj+pIptaG+By3eGh6TGStZwSFDIFW
                  W4M8Mmn1mQ6ykkHarEWvSLLLSQGgnHcCq1Wh3Ny5eZYe/nKpW38HVnS0EmA1jGPpFLziF8CtruEV
                  xUSMGXsEgtjBzXSZel0K38P+1eK9GMup8zYP3FEmVmnAUhlhzDncuHOpPhivGnLw9CejLIH0rx2q
                  BnfD3dG08zaVH2xXZniHwit1xeC1xEKVjry0BMfD/AmOEiKlPtT4ok8gqa3WC0YcFyRb4A6keVhu
                  Ipz8U6vhj+CG98VuJtutd5bVAsbX+ZnvY8xaSRlCfdWcV0vs/AG2sFPNBQMb/TTP0FoeHpO4F2Mw
                  lrnb8MkClO07LcucV465IBhgAyp3RmibPw+03DsOn7cxa7XDbDTMdhOAEjpn1Puamig8vptWxWvO
                  mMQWi4+4GkDuafDQ0YaheSTk8rWU0l5tbT6EutLBSpCwCCPQiuUv/ko+Fy0cMb9a9ZaXZTEt19kL
                  ZkW9tP8ALafCebKPQKGdq6G6l+JXh/YXVMOXlL0oK5A222cZ91HAH70leOOq9G8eNPxbdclv/Jw3
                  jKSEqScqAwcEZ7dqi2abrADmdwilG2+nKJGnj1HuFx0lW1TcgJLKmwvBAx0PetW4Wv5VW43xnc10
                  tb0zwmtcdlpxpuQlR/kfOMAFCu4ycb/eoLUvBDg7dLfIVHtOZsheS6pammhnfmASThXbI/amfwyy
                  3lWU65Vk4LcLnJ8pzK2BJ9q/VW5Rzv8Asd6uVdPhH0m8koZuN304p4ZbUtDUxgqz2XlKse2M0B6g
                  +Fd7RED5m63JExhZPI9FACSM7ApOVAn3296jS17EX5mqVDfqSjAcq0qjLQd818KbWNyDR1qHSDtt
                  fcc5FlhJwnDSk8vpzEjH7UOORCk4xmoomB4RBsPGQVFJyANjX2h0pUMj963Fx8dt6+THwOmaXvBS
                  wzK9G5QCAOma9WpIKt+leKGhntX34PbIpkhqcMe7lbKXwRsK+XHQMbVrqRy9+teTij6etJDQudL2
                  W6l0K7VlR/iKFZXemu9Mr+gzhLbERoIHKDTWbbDaQMUB8O4oZhNkDc96YA6UYpN/tBYnS5Zkr8wP
                  Sv3FftZRFEVoT7a3MHmTmviLZmGBkIGftUlWU5vcBhMGFhduXgmKhI2AH2r98BIOe9epNVZ+If4g
                  9XRbg7p7QMeNF8NZal36csJZZA+rlJ7jO3Un2pPJTojafROriBxi0/w5bKbi+pyRjPgspyQPc/8A
                  HWq68auPMeVF5rrdXbbHdQFsWqGSh1SDvzudxt9qr/dtdwOHN1cmaqtV/vUpxQeXqSYgzGGAei0t
                  JX/LT7hKjQxrKE5fAq8ImRWNPzMyBdXVl9qYk78yM4UrG43xy1JjYM8pYIbwVrzeK8O6X9ca32d6
                  4OPq5MOL8ZRGNvKc8v8AatS5aiselXlsuSoVreWQp1pLRccSr0JK+VP23oDm8TdI6fYnNWS4odlO
                  p8NP+YDaG/8AUjCThR9c0oJF3gxJ7rwhp53MqVKkLEkn1KeYcpPsamNY0jhK3tHqrFSOJVrujgRF
                  nsyZGAQJQSpsnsfD2xWwxr68zUrgTEMNMqGPGtyC3jPdSN8j3Bqsj+q3ozKfHZtky3OKw3IMdCFA
                  4+kgY3+xFSVp4hEsvMtPLYKAHAwlZJAA+ppROfZSDn2NTdkbTzwmDIXcAJ3v8StU6Rjupucxc63N
                  uqbVHdQHQlH6VJIGRjr/ANU1NDcX7JqxlmE8EoccPy5D+FtuK7J5u2QdjVVLhxVXqSM3GcW2JLYS
                  pEkqKQSB0X98Yz60WWMxLjpNvVNiUI7CSlNziteUB1JBC0p6DPfHfemXhjjtPZdbubyO6sFrThFa
                  Lpb3pDMZp91xKkJDvmCcb/mqy6t4ZOMz1pW0lnG3kTgYqwnDXjIzf7W+xJeR4wOVIXjYk8pxn3qb
                  1Rbo85sofjlshGUyGWkKA/8A3HUfiqXq+kucOtWOCFatK1cxExyjhUruOhXY2VJTzDvUG/pxaFfQ
                  QKtDe9HlpLnNyg5/S2dxS+n6XCpQbSAc+1Z+b0sDtsq0OtaglHZJJyxuIGQnO/atVdveRvyKwKtR
                  pXgqm5BtTiUnmPcU17N8L9tnBHO2g83UctKGs84DcpU0ldozlc+FtKR9YI+9eRZJH05rpM78Etgn
                  NhRYQFH2oTu/wHRVKIYylJzjB3FTRqrB+ZpQ/wCIiHcqgCm0pO4wayrk3r4DZrCeeK+4Vf0kisp7
                  8Xre5/RPNsRuGcrrPo9oJjM4GB6UYDYChXSI/wAq1RUfpq8VmbIwFhlL/Gv2srKypSIrKysrTu9w
                  btVslTHV+G1HbU6tWM4SkZO1eXkH8XeI8fQFgSlDLky8XEmNAitHBW4R1Kv0pHXJ9Kp5xI0JIuVi
                  ZYVEhuNxV+M74wXKIcx/8obJw5t0J6ZOBUNrLiddeJnFNC276zZnQvx4aZvO6oNg+U+GgbD74pDc
                  VONGq9Haofg3W7xLhDUSpp23AlxBzt5ex9s9zUyKMOCSS9vIHCNot609FdjQbjcIl8ZaRyMOqgtt
                  hpI3U2nlO4SeiSnIPaq58XNU3PXF1kqakoRbB5G1uZS0hvskI6ox0xjqM0I6g19B1DdFrntPrU4V
                  KddirCHFjuAD5eYYzg/vUc1qrR9kitybFLm3C9qT5kXpgoS0jfOEpJCj7kn7U4/bG4JHmctG56Ph
                  W2E3LKmJ7ju6XYrRdbSP9aQoEH8UNv3RNt/kToTaWuilsKWhWPXfb8VuTuJF4efWpTDTLSj5DHKQ
                  jH3AqDuGpJPOXOVSEqPmQohY/wCqdMkbexSdjvVfkyV4kJ1trL8NxJWsY+hQO3sc7HIqDslxWqY3
                  4isoQTz56Yxv+9ezN75ZXiAJSvBIWEgZz2UBsaifGKFOFJ5ST0HeoUkhecgp9rQ1Tsi7Je86HClS
                  ByJz15ewPriiHT3ECXYdHS7W0siPNcPOnJ7dx70AIVnIPc716uuF1JCCClGyRTe9w9U4nFoviA7H
                  akJcUoLkJSlSwvuO/t71b+z6pMqDa3fETKSEpbIK9+YjfCvv2Nc8rJcwzMTznl5cfvVieFWtlPuo
                  gP8AKW3W/DWEE7DOxHpg1PrnqBzX85TLstcC1Wmvb8a5IW6hKUpQkN56ZAG2ff3oJbsLarm2rlSr
                  mOQRUppOFIUyqNKkFxbJPI8jzeKj3Hr9697oz/B7iw6lxTzK+ilIAIPptkVnWu6U9ztyIM1J9YDn
                  hMrRdpS2GsjcHrTn05CShSMCkvonU0eQGElQCh2p4aZmtPhCk47VUBU2eiPwaoyy3ujq2Q0rQkdh
                  W+q0tuJ6V52laShO4FTaUp2xjenzWcQpXXB7IYk2FG45evtWUTONpJANZUY1jlOiRT+hpAfgtnNG
                  GfLSd4WaqYehNgr6CmoxcG3AMLG4rWa8gewYWXUpBsUhWV5JeCu4r75x61KRMEFfVLH4kojczgpq
                  lDsl+K0iN4inI314SoHH2OBn2zTKLqR3oP4wMx5/C3VTEh4sMuW19K3U9UAoO9ewkPILSMrhjrq2
                  X2/cTGlszH0My2glLzSihCUp7bdNu1ft0sVztLUqCZTcOBJwpwPpLvOsdNyfq9VD7UZaltNj1Ja3
                  Y9smnxmQOQtlSPFVjGSPU4poaG+EC7antlmkzmVswEhvDL26jndS1epoZYvMpDLijlWobWGt9lTt
                  nQF1vVxCbfGkLe6pcbVzDPqR6VKPfD/e1+aVFeAGSlbLR5sntg4NdfOH/wAMuntOw2v/ALa0VBAS
                  FKSAcUVXngzY3WTiCyggYBQ2MgUE/FLcx3MbgfNWBlGg3+248/JcKdRcNLhp1wtpWpwD6sIKDntk
                  UKSYkyGvlUlSCRktkdK7B8UPhZsOorpCkAORhFWoqDTY5nUkbDPbBGaSWuPg9hTFuvNqR8ypRAPh
                  cux7ketTW6o7Hnakv0GJ5zE/9Vzras8mWUlppSiT9IHemBpTgneL82pZjKCVJzkjIBq3GgfhNVZb
                  grxUCQOfy5BAqy2keD1ttUNLYYbCj1AFSBO+QeVIbpkUGOryuW144FXuBlDcVSyenkO9Ck/h5d7T
                  lUmOttPuk12jb4S2qTyc0RtQHtQjxL+HGx6ltBjphNMuZOFBODU+JzwPMoNmpCXHp8LjLNhrhPqB
                  V0PWj7h9fl2qS26QpwEjYHGKZnxH/DTdOGMtySyA9CznYdPekjpO5twJBjTQTDcPKpxP1NnsRRiv
                  I3dlVuWN0bsFXA0ZxEKrlBEl5u3ocWhsurSpbZycEKKRlO3rRtqdt+y3iRG+ZEuMFEpWnZC09lCk
                  doq/o+TjxXnUMT2FAtPBOA+3jYH+/wC1MRvUYvtlaEglmQ2koTkbnlNMajHDNH5ByoM4eASOyIrT
                  qRy2yUpS4cpVTb0fxVehhAcWop/NVsZnFD2M5J7mi/TstThSeY/eqZ8G16rzLj4HHaVcLT/GNpSE
                  Zc29zRlb+LUdweZ1NVa0+w67ykf70d2y0vrQ3tsalt0l7gj8Gs4xuT9a4kxnRs6n96ylDHscpPmA
                  Vj2rK7+ByI2NXb7oV4Y8bU2uWht9/CFdMnarK2Hi5Clx21CQncetcf7RxFkZT/PUD9zTE0/xhu0R
                  KUtz3Ep9OY1W69m3WO0DhUKKV1fjHC6127iXFWB/NTn7ipFziNCSnPjI6eorl5b+Ot6bSgCcrf8A
                  1GjGz8drioID8lTgxvvVig1N7uHNSpLxHZdBlcSI61YDo/cUN8RNYs3zQOo7elRKpFufQnHXPIcV
                  U23cbE8o514J9KlUcY0OAAKSon9JNTXakAOE0LnO4qofwt2n5/XcCROSkpBcQovZCUrSrGOU7V1x
                  0baGpcaMPDS2lLacAd8CubMRhidxOuSowbY+XuCXGG2cJHOrBOw7b10y4bBxUGIp0HnLac5HtVfv
                  ydWdjT6rV6eRQ67eMo2Ta222UpxkgVGXOEkAjl7USZSE7kD71oyyyrO4NGjXa1o2oVFM8OyUtbvZ
                  m3l55MH1oZuumm3Fgcm/qU00pENmTz5wkitA2xh5RSpCT6KqEa5J8qtMN3aMFLGJpZmMpSkt5/Fe
                  4sYOyU4/FMFy1xWc5x6da8HYTalAIKRv1olDG5o8yW6dr+QhSHbS0kjGMbZNfcyMgIJcAwOlE67R
                  lBKFJJ96EdRolsNuNLQUnfBHeiGQ1qHk9V2PVVX+L6FFnackJwHUlCtvxXJ67M/JT3kdE85GAa6b
                  /FRdHoltWojlwDt2Nc09Vtc82Q+kDlW4Tt0r1WYyNcPZDNQi2Obn2Uvo7VsmC43Edw82fKjxD0Hp
                  ntTzstwdaiNKkRvBUUcyFqJClZPUg/aq7aZj5cRJdSTHSocxHanzabiqdZ4alOOLSlPIgLzskdBv
                  Tsj/AC4QC24tiKmhPK3grOPvRppO5cjzeemewpYGQtT4x5aJ9NTlNvNg+vrUCOIAgKiPdkEq0eiJ
                  LbyUc2P2px2PwS03jB+1V20TcSGG/OBt0pwacuuQgZH71ZGNw1Ntl28YTYgtIcATy/2rKjLJcisJ
                  8wNZUtT22OO64w2yQULG+P8AajG0T+UglRz02oFjbHepqDI8MpFZ86Jp5wiNpgPZMy3T+cI82AKL
                  Lbc+QBIOTilha5fME4OKII9z8PG56daaEH/FA5m9kyGLycglWNsdTUm1ekoCcuBO4ySrA/elaL5y
                  9DT8+DW/6Z/+qrjmp7VHvTLUNS2GpSOdDagocy+U7EgetRpWtgBklOGjul0aMuo2GVIPzO7fv/Cl
                  /hx4ft674zwnAsriFC5rikqyFFGB/viug921OjSNuUhptxboR/6wBj8mg7SehbHbeOE/U1jisQ7d
                  PsKClmIgIaC/FwpQSNgSMVtcZF3xqzv/AOHoXzlwcThA8IucvvyDdR9tvvUK3iOXrw+Y+i23S67j
                  HHSscbe/p+qTnEvj7xGisvKscNfhJJA58AYB65J3pVW343+Iun3Sxf8ATofSkjLjKtwn3xU9qWw6
                  6i6Nvt1Y0ChN0tzRfD+skqkzbmQMrTGjoPgspAzj6umMd6qI3c9dat1O5IGn27R4MX5hxSWFRA45
                  n6EoKQheeycZ96luitzw9YkD5dirJF+HQTCIMJB4z3C6I8OPiYi69AQhamXiMlCtj9qNJ3EiVa2/
                  HdTyNf1k7VWT4f8AQ11v0+23GXanISHVAOlaeRQV6EGrecR+HERzTS45RslgnI9cUIpOtz9QZxtR
                  W+zTqkzImgHckfr34r7XpFpxT8gKWnOUp3B9KQl0/wDIJc5c9TdtskiQ2ThCm0mlDxFjvsXS8uuR
                  VOxYbhBcd8qB7E0AO6qn6FiWe8XezynLZdnHERVtvGM15Pq2A5z12Jxmp9F1iy4cZ+pwEnUYqlWI
                  OJwMc4CtfbPjL11KCFJtUlk5BKVAYqwHC/4mrZxLht2i+R1266nyodUnZaqoLYONUG96a/jD0K86
                  ZiGQYyJcp1M+IpwDoQQFpB9RnFNng7rFrUstokMNSkr8j0NznZd90nGR9jRqTULVbySxgt9wgMem
                  07rDNXlII90+ePHCIa80/c2GEAym0K5CR+rGwrkdqqyybdeZ0CYnw34zxacT6EHFd0NLPIu1qZcd
                  /wDyVjw1gjrjvXKX4h+FUu7cf79Z7WAHpc8NpOPKlSu59hReq0DMo/LjKqV/qPIYeXZwlpprTbbV
                  rjKd3aJ5+XsqiT5xSU8gASlOwA6CrT2/grw00BpC26W1Fb5eo9STkhr+IwpJZ+SJH1pO6Tg48pBy
                  KqRPIhzJDCVeIGnVNhWMFWFEZ/tQ024LDyIn5I7qreINL1DTBHLdbhr87fnjgqQaeyrJOO1Ttrn+
                  E6lWcYoQjv53qRZk8qQcmvdTByFn8uTnCemjtXhCEBbm3fem3p/WbCUoIcGfc1T6Ne1xl+VXKfWp
                  +Br2QwQPFVkelT4bzoxgpkbgFe3TOso5Sk+KP3FZVNrXxbeiJSBIXgetZU78TC51SPRVpQ2EgYre
                  ho51DtWohtZcOxwRUtbobvMPJkHc0JDMjutAxnhS8AeGlI65FSjaicDPatOPHcSAeXatxLa+YYBz
                  TrGYKYdWa1fZ8o3IOBTD4A38ac4r2GSW/EbfdMJY/wBLo5M/uRQD4XMndJxipfSEhUHUVtkJPKWZ
                  TK8DthxJ/wCK5PEJYXMI7gpdRrqdmOzH3aQfuuy2irYxbpyorY3jQGmCB28xNHUq3vuQCYwSHMZB
                  JI3/ABQ9pi2hnUE19WQH47Ss9j70wWUJQ0AOgFA6FTy7D2GVfNQsf3t7TnOD9khNew+IVyZcYgw7
                  dJj4wC++oK/22pa2TgXrC+3FBvc9m3RUnJYiLU4o+wKth+BVrLy/DipUt5wIQBvvQ5adVQbrePkr
                  e0HcDzurG34pM1NrHA7zk+mUcratYbWIihaABycfyVo6a0JEsYixmEEIawcqOSo+pPc0Q67YzaZX
                  LsfBOP2oijMjxCrwgjG2cVB6qmtN86HSkJKeXBNFKtURtc53cqvNsyT2GuPOFSVHDNiRPmh1PJ4y
                  1KJ5Qck98HY0N6l0le7RG8CVpdi92xKitC40RpzBP6igjZXvirO3G2rbkynY8Zh2OD5fEBGcDetL
                  R2qrDqVZZ5PlX0q5Sknyk56j1FQH1hABHuxu7LQ2ziXMhZuA7hVZ05M8N4MxtAOEhX/vt4ShJ9dx
                  gftTs0loeBPLMmVarfa5KPMn5NkA598JFWBg6YgJIPKhWd9wKl/8NQZTfKpKcdsUQqVJQ3Ej9yB3
                  tRrv/wAUe36Jfaetse2R1uZ77+lUo4gO2aw8a9U3d/B55yWlucuS2OQbAdzk1fTUFvbtURbbZGQo
                  bdiKqHxW4cwNVp1DLbSE3OBPRJ5knBdbKcHb1BGaevkx6fO1nfA/dRtEjgtanCJs7Sf4W9drJbbp
                  p6zz4zSeSMtbi3cYIBQT/wAVzPn3L/PySdwXVnOevmNdHb/JVpL4cdU3LzKcFuWpBVtuRgY/euXb
                  sslWSTmq/o1UiHqEYyon9QZ/iZoahORHu+5REzPyvbvUrGmlQAO/pQdGljHXfNTESUCE4P8Aejbo
                  ccrGJK7R6KecdHKTnevAy+U9/wAVr85UBvkV8HrTRaAFG6TFspmqR3P2rKjnnDkVlNLoib7JtR+F
                  zThBA2PqKLbHwoYdZSCjfHpTIs+mCtDZU2T/AMUf2LSyEtg+GTVt+HYCCFawEljwW50ApbyMdq8U
                  8FHW1ElBIx6VaqBppvwUgNn9qlWtJNrTjl/tSzAw+iUclVBVwedSnlDX5wa8YvCSQxICkNkLCgcg
                  ftVyDo1sp+jt6V5I0a004lfJ5kqChttkEGuGsADx6JHI5VpoKnIUGCXlEPLtzKig/pOADWnctauR
                  Y6gF8pSOmetClo1w7qe8K8RAZLNvbbU36q5zk/bpQrxglSbXo65SoKSqalpXh/c1mt6y+CfazhaV
                  ptWOzsMnOUL6941O3C9Is0OSH7i99MdCgSB0yfQU1eF1nuFsajTHS2p1CDgdiT61y64Ka21Mzxeu
                  8ZtaZUwvHxXXySMkjYGuoOkbrcpOnW/GeiwngjlCFLBA96fZWdFIHzPy4jKP3LMctUw1Y8MHBPui
                  Wdxdds94Xbbrb1QXVIKmHyeZl7HZKx+r/ScGlhrTjlaba29Nmvt8jeTyqViojiXpq835U1dqv8dU
                  tLqC0w+f5RAG+NqrPxQ4Ua/upUuS9ao6OhUuQAD+O9R7Ni4H7AeDyCpekaZR6ZmlGHe3v9Mp+6f+
                  Luz6jZNutsB6ZKcylX8khoZ/1HagqTFlaaeZnMF1tCN/CKjgZOf+aUugdH37QstMiTOgzAV5Q206
                  kjAAGAMjHWizibxGv2mbE3IetPjtoKkOlBCtuxAqbPA+WFvWkyU7XuQ1pnCGEgfun9pnjEh+AhZk
                  BWAEnKuholj8WUoUkKdBBPY5rlen4hrtpnW3iuMuC3OrHzUblIKQf1j0NWws8p+YYzrbiy2tKVpK
                  lHcHcUNlfdouYHOyD2KktZp2oNeYm4cO4KtM/q03Z9K1AgLBPKfb2pVwbB/jTUF4R8w1BgOyg28+
                  FfzFADcAe9a9l1YmM0ttxRJQOXKjjNaGgNdRtO3OfFmQJE+K68Xo8lKMhtzuM/8AdXSsRNTfJJz2
                  Cob99W+xsWBgEoN+Mt2bpbgPcbctkR1XOQ3BhspHRlCslR9Sa5lTLW4yvptmuonxL3VPF+NZLemK
                  pLVtU44V5zkqwMf2qsl14GoU7zGP39KlQ18MHTHCqGrWn2bRe45VUo8NzI2qVixnE42qw44HpTsG
                  f7V6NcF0p2LO/wBq9JXfhVWckgpEx47mB3r1VEcBPl6U+kcHEg5S0a/V8IRy7tnOPSh7q78oYc5V
                  e3ITqiDisp8r4RAdG/7VlJ+Heu4KtTZbAnlbA323o0tFlAx5cAUHac1Ey8ANh2pg2m6MLbTviraA
                  rNlEEG2coAxsBUvHt3MOgFaMGc2vcHap2JIScE/714rwcV8ItII6V9qs6eX6M/ipOO4hWPSt9vlP
                  Sns4wvF2RgoQaSLFqi3LI8Nmaw7HyP6xhSf9jU1PDV6tj7LwzzJKSk9QK0eI1gkXzSkpMAlFyjFM
                  qKobkOIOQB9xkfmhfSuuW9QREPNA8rvkW2v6m1jqk/nNZr4irOjmE7RwVovhyVk0PRB87UtdI/Cb
                  bJ2pdZRZbjzUC8Mp8GQwvkdYWDspCh0IO9R2jvhJ4t6N4kwESOIFzu+iHlcjxS+EvsEbgnIwUn1G
                  9Wa0s0UzPG5yQoYxR9/FFwmMpwvvyK3BoXTsMkj6c/6+qOz3bFKXFfH/AH/73SkPw0XV2QPC1lcf
                  l3Vu4Q42hxII+k8wAIHtvS+1H8MvEKXIuPh3S2Skxkfy1uoWkKGM9M7n7Yp8yeL9pgTPDc5oTqSS
                  UpVt+1R9x422ZLbpE1a+ceYDbPtVijq1nxgCQY+vKk17/iAEkNBz7sH8BVMvvwuaxhpEm56gi/Lr
                  gOyyhiMEuBaRlKEgknJzSFV8K/E/XGqG46rs9ZrGnl8aZJeyte3mKWx+RvV1NU8YU3iQqPaYyCob
                  fMPHmKB7E9K8Is5XyILj6pKwAVLzj8VGmdSgwWnJH6Iu+a+GFlnALvYY/ZVg1t8JthVqLTsC2qd8
                  GIECbIeXlUltKsq5j/UaZt2ci2l5LUUJbb2Q0gHokbAftU5qy/C3hx5CcuqBwCd6ROsddojXD5hT
                  g7AJV2qvSyOsytDuw7LrI2143PHc90V3/VC7UwVF3mKzgJz0J2AFNXh9aJE7S8eTKbLTj3nAJzse
                  9U1iazf1/rK3WOGgl56WEJKQVADO529K6K2SwtWizxIbY8rLaU59wN60fToTBU2H1OVkGrzie1uH
                  oMILf0sF5OB+1RsjRqVqzyD74pnrgpz0NfP8PR/TmibcgYQHGUqjodvryDP2rE6Hb6+GM/amqbWg
                  /p/tX03aEK/TilZ900Y2nuEqf8CpR9LSa+F6EStBy2Dntim6LOkbgZr7FkSQDj8U0W5OQEw6s0nO
                  Ek3NAIH/AKs/isp1KsCFdv3rKTs+ST0B7KmFgvSuZAS5j7UyNPXp5SUAu5GarnpHUIfSghXbpmnH
                  pielaGzkE1JzlSAnhZrurw08xycUWQLsVgb4NK+zTBhOaL7fMB5cEV5KCPI1y6VLR7grA/7oOjSh
                  kb71MR5YKRvXgfddIz2RS3LK077UCal0QiHNlXuzIQiUpPO7G6IdPc4HeiOPL2xmtpMsCo80bZmF
                  juQU/WmlqSdWN2CoLhrriPe5AjFtTcpBwprO6fxTj/hXzcbkBPN2pC6utUm2zm79ZmG3ZTJBejp8
                  inU53wfX70WaX45264ReZUgR1FXIsOKGUKzjlPpVAsaaKMmO7Srwy27UGCRnDh3Qvxj4dX6S265b
                  w24odedO/wCCKQE3h7xBXyBFvJG2SV5GPYVam/cb7XEUhqU6gAqAVhQoUunHjTERtZL7SghRCSlQ
                  3pUVKJxyFaq+o22R9N3p80sNFcHL69ODtwlOJSMEsEBIH/dMS5WJu1xXMcoZaRlXMcbilfrP4m4c
                  JajHdRGWkhQKSCaVHEz4uGlWR+Ow4lDqyRyhXp61JNFrvyhD5NSduy8qS4scRYFskuLS42QkFIPU
                  mqo8QeJKbu6WWwlPmwFpGSaHNYa9m6nuTnMpYdKuYJQdvzRNwm0I3drxFkTW/F5FBQSsZGc+9dr6
                  eyCQOk5JTNi7NZhc2EcD1VnPgT4QiBbrlrq6NEyFnwIfiIwUAnzLGfUYq338RQP1e1R3A2wR7jpF
                  dtI8JpTWEY2CSOlQ98RM0zdXYE1JS62fKSMBY7EVeSzawFvZZrMSHEORYieg43r1TLQo7EUDMXnJ
                  GVY9q22rwOYbimiSO6ZRqlxJAINbCCnAwaFI906b96kWLhzEYOKWud0SMhB64rZbQlRGBUKxMBxU
                  gxIBAwcmnB2XVvJYGKyvNL+w3rK8uYXIbhrKdebbyo1YnSQV4bOPakpwwsSiholIFWM0paA221tt
                  TG/CS1p9kZWYL22orhLKOXPp2qNtUFLYBwDUmBydsbU412e67twpiPK3G2KlI84c2OgoZRI3HpW6
                  zIIO+1LwuD5IvjTARnNbBngDrQu3N8NIwetewnYHXek4XchEargkpO5NAHFngLI1VBN50dcP4ReH
                  m8vMOE+BJP8AUR2UPWptdywD6YzR1pC6CXp9sjdbSikmqt4gc+Ku2Vh7FWbQpA6R8XuFy44p6i4h
                  8Ob5MZ1BBkx1FWGVEFTYAOCoK757Upr5xkvk9lhoE8qFKKgP1E+tdVOOuk7drCMFTYKZCkAjdPN9
                  qobxK4aWe2zFojs+Goq3ATjFVqvr8RJY5i0BuhzztEkcmAVX/wDxte7gUpWHH3B1yOteTViud5fU
                  qUtaAo5CRuTTGa0zFZcwhvf1oosukipSQEdD1xUmTWct2xjAUmPwywczuyUJ6M4dBDiFLbJzg5V1
                  NWL4eaObjLj8qOXB6ionTOnEoKecA47U4dOwEx0IDY7io1e0+SYFzlMtU2RQbGDhWP4NSUw7ehA2
                  IwKZF10xZeIDrEC5trDuSGZLKuVxs47H09qTPD2WqMoDokmtziP8SuluCafnbhIE27BpwRbfHUCs
                  uFOElW+yd9zWpU2yWoxHENzlj2pwMrudJKcBQereGeotHTg06yJcVSiGpTCgUq32yOxof8aREf8A
                  BeacQ6DjlUk1Xc/EVrfivqbxJE4tRkqyG0ZDTSf+/ejS/wDxNrgR2LRaH/mpzY8NUgJ5ylQ759K0
                  YeCbBijy/wA57j0CzR2vhkjsMO0fdOSLccEAnlUOqT2qbhXL6d96Tlq4muFjxtUT2VsupStE5lrz
                  tKxulYH1D3FMK1uGbBanQZDdxhrGUvRV84/I6j8iq3qWg29PPnbke47ItT1evaHBw72KO407m6Gp
                  NibkDegOJdCF8pO/cHtUzHuWQPMKrfbhG2uDuxRi1M6b1lDaLkQUgEVldSufdUd4eWnwGm9huMdK
                  dunI3KhoAZ70GaTsaWEN4TgDFMyzwgkIHTahXU+SlhuFPwkcqBtXo8eUiveOjlR+MVryDuKkMORl
                  MSd18pc3G3QVspWSAentWsy0pxwJCSo+gousehpUtCX5ShHYx9KvqNT445JTtaOVCkkbEOVCxw4+
                  eVCVLVj9IzUxE0xdp48sRbQ9V7UW29qJayERGkg9C4dyTU0icvkPNnAoyNNaB5+UHkvFxwwYQjC4
                  eNt8y7jKOT0bR39qKbdZV22yuusRksQOcIS4VeZau/4qGu14Dc5KSAOUZ3o2t0pN40PG2CvBynlS
                  dgQar/iuH4bSnBjPzYR/w3IZL4eT2++UpuIxeiW6QuMAvyk8qjVGtZWi43a9yH5DKmkqX/VXQDVk
                  NuTb1BSc7Ebiq6au0lH8VZSlKdycgb185PeI5eCvp/THtdBtIVe7VottSuZTalrBzRQzaQylKUo8
                  P7DFH0OwNQ0lZSFHG2R0rTnW3BWvlAA/AFKjlfI7DeURcdp54Cj7Lby2oY9c5ph2cx47AddeQyhH
                  mU44cJSMdT7UodS8ZtMaAiK8WQm4TRnEaOcn8ntVZuJnxEag4jvLgNOKh2knlEKMdlDtzHqftWl6
                  H4du35WSStLGfP1Wc674hp0mujicHP8AYen1VmOKnxkN2NDlj0OtMiZu29dVjyN+vhg9T71XWPPu
                  Oq7i7PucpSlLXl2XIUVKP5oMs+nXwtMmb5U/VynoPv6VMPTpN+kJt1vby0CAp1P0gegr6p0DTa+m
                  QBgbz7+pXzhrF2bVJS554+wR45rAPsJsen0hlsnlemZ3V71PaTixLGpJXzuugnKyN1e9DVisCbS3
                  4acK5vqOe9EbCXHX22W2sY7jcmtCjDnDz+qpUpZgiNMO0ylyAC8QUKOUgimFpybItDClWt1cFSx5
                  nGcpP9u9BGkLMwlDbkoKUMjIJFGv8atsMALebZaQr6UjKjSrJDhsxkfZDA0jkJg6L1Hdpq0wdUxX
                  JHMofL3qGnLmD2eQOuP6qMTbn23SmLIZmpB6Nqwv/wDk70sInFGLAbAYZ8VOMAnbP4rYY4vuSHEh
                  EVCEjopKMGs61Dw829IZGx7fof4R2nq1imNp5b/CYP8AEltOcroW0oHHK4MHNZUBE1y9dUIRKQiT
                  GxnkdGFAeyuorKpk/hq5G/EeCFaIfEdZ7cvYcoUssRDaE+UdNvei23jBSQOlZWVmquylkPhKdzti
                  vLd5wJT51HomsrKm1wCcFMzHDMpiae0/HsEdEyXhyUU8wSe1bU28rmlOF4/0+lZWVpFWBjWDA7Kk
                  WZHl+Mr0iKCEjHWv1598qICwE9ayspwjzKL2CEdRvqQ8V8xWFJx1718aZ4nP6VtskvPspyrlVEfO
                  En3FZWVPnqQ3K4hnblpXoLMtabqRHBCjdT8e7NFhpL7KeZR6NubClHqTjDZyyX0MhSST9SwkVlZW
                  eWfBui5Dujz9T/taHQ8W6s1mBIP0H+klNb/FHGtgeagR4ynBtn6sUiNXccNS60UthuVKeSo//CwC
                  hGPTArKyilLRNPpbTBEAffufumLmt6heBE8pI9u37IXZ0Lervhy4vfw9hW/Kr61fj/ujaw8PIlqj
                  fMchaaT9TzicqV9qysrQadSGJwc0clU6axJIME8LIthuGq5amI6fkrYk7qUDzKH3osRa7bp+J8nD
                  Qnm6Lex1rKyrXAAzgIPK8lu1frDgdJQhBVvsQanIDyYyQE83N+o5/tWVlEWyO2oc5oB4Uui7yVtD
                  C1pbG3pX7HkyFL5lA4PTJ3NZWV0SOK502rebkOJVlSinbHLjrW7DnucicOqCweoNZWUtjyX4KakY
                  3aUU2u+OsBKfGU4kjoVYI/FZWVlOuY0nshsh2nAX/9k=" width="200" height="200" alt="Mani Kumar Reddy Kancharla">
                </a>
              </div>
              <div class="profile-overview">
                <div class="profile-overview-content ">
                  <h1 id="name" class="fn">Mani Kumar Reddy Kancharla</h1>
                  <p class="headline title" data-section="headline">Software Developer</p>
                  <dl id="demographics"><dt>Location</dt>
                    <dd class="descriptor address"><span class="locality">Hyderabad Area, India</span>
                    </dd><dt>Industry</dt>
                    <dd class="descriptor">Computer Software</dd>
                  </dl>
                  <table class="extra-info">
                    <tbody>
                      <tr data-section="currentPositionsDetails">
                        <th>Current</th>
                        <td>
                          <ol>
                            <li><span class="org"><a href="https://www.linkedin.com/company/stumagz?trk=ppro_cprof" data-tracking-control-name="pp_topcard_current_company">stuMagz</a></span>,</li>
                            <li><span>Right Process Infotech Pvt Ltd</span>,</li>
                            <li><span><a href="https://www.linkedin.com/company/voonik?trk=ppro_cprof" data-tracking-control-name="pp_topcard_current_company">Voonik Technologies Pvt Ltd</a></span>
                            </li>
                          </ol>
                        </td>
                      </tr>
                      <tr data-section="pastPositionsDetails">
                        <th>Previous</th>
                        <td>
                          <ol>
                            <li><a href="https://www.linkedin.com/company/voonik?trk=ppro_cprof" data-tracking-control-name="pp_topcard_past_company">Voonik Technologies Pvt Ltd</a>,</li>
                            <li>W3 Shastra</li>
                          </ol>
                        </td>
                      </tr>
                      <tr data-section="educationsDetails">
                        <th>Education</th>
                        <td>
                          <ol>
                            <li>CVR College Of Engineering</li>
                          </ol>
                        </td>
                      </tr>
                      <tr>
                        <th>Recommendations</th>
                        <td><strong>1</strong> person has recommended <strong>Mani Kumar Reddy Kancharla</strong>
                        </td>
                      </tr>
                      <tr class="websites" data-section="websites">
                        <th>Websites</th>
                        <td>
                          <ol>
                            <li><a href="https://www.linkedin.com/redir/redirect?url=kmanikumarreddy%2Egithub%2Eio&amp;urlhash=2-oA&amp;trk=ppro_website" data-tracking-control-name="pp_topcard_website" rel="nofollow">Personal Website</a>
                            </li>
                          </ol>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </section>
          <section id="summary" data-section="summary" class="profile-section">
            <h3 class="title">Summary</h3>
            <div class="description">
              <p>Been working in web development since 2015.
                <br>
                <br>Current development stack -&gt; PHP, MySQL, Neo4j, Cassandra, React-Native</p>
              </div>
            </section>
            <section id="experience" class="profile-section">
              <h3 class="title">Experience</h3>
              <ul class="positions">
                <li class="position" data-section="currentPositionsDetails">
                  <header>
                    <h5 class="logo"><a href="https://www.linkedin.com/company/stumagz?trk=ppro_cprof" data-tracking-control-name="pp_company_logo"><img class="lazy-load" alt="stuMagz"></a></h5>
                    <h4 class="item-title"><a href="https://www.linkedin.com/title/software-developer?trk=pprofile_title" data-tracking-control-name="pp_title">Software Developer</a></h4>
                    <h5 class="item-subtitle"><a href="https://www.linkedin.com/company/stumagz?trk=ppro_cprof" data-tracking-control-name="pp_cprof">stuMagz</a></h5>
                  </header>
                  <div class="meta"><span class="date-range"><time>March 2017</time>  –  Present (1 year 2 months)</span><span class="location">Hyderabad Area, India</span>
                  </div>
                </li>
                <li class="position" data-section="currentPositionsDetails">
                  <header>
                    <h4 class="item-title"><a href="https://www.linkedin.com/title/software-developer?trk=pprofile_title" data-tracking-control-name="pp_title">Software Developer</a></h4>
                    <h5 class="item-subtitle">Right Process Infotech Pvt Ltd</h5>
                  </header>
                  <div class="meta"><span class="date-range"><time>March 2017</time>  –  Present (1 year 2 months)</span><span class="location">Hyderabad Area, India</span>
                  </div>
                </li>
                <li class="position" data-section="currentPositionsDetails">
                  <header>
                    <h5 class="logo"><a href="https://www.linkedin.com/company/voonik?trk=ppro_cprof" data-tracking-control-name="pp_company_logo"><img class="lazy-load" alt="Voonik Technologies Pvt Ltd"></a></h5>
                    <h4 class="item-title"><a href="https://www.linkedin.com/title/software-development-intern?trk=pprofile_title" data-tracking-control-name="pp_title">Software Development Intern</a></h4>
                    <h5 class="item-subtitle"><a href="https://www.linkedin.com/company/voonik?trk=ppro_cprof" data-tracking-control-name="pp_cprof">Voonik Technologies Pvt Ltd</a></h5>
                  </header>
                  <div class="meta"><span class="date-range"><time>December 2016</time>  –  Present (1 year 5 months)</span><span class="location">Bengaluru Area, India</span>
                  </div>
                </li>
                <li class="position" data-section="pastPositionsDetails">
                  <header>
                    <h5 class="logo"><a href="https://www.linkedin.com/company/voonik?trk=ppro_cprof" data-tracking-control-name="pp_company_logo"><img class="lazy-load" alt="Voonik Technologies Pvt Ltd"></a></h5>
                    <h4 class="item-title"><a href="https://www.linkedin.com/title/software-development-intern?trk=pprofile_title" data-tracking-control-name="pp_title">Software Development Intern</a></h4>
                    <h5 class="item-subtitle"><a href="https://www.linkedin.com/company/voonik?trk=ppro_cprof" data-tracking-control-name="pp_cprof">Voonik Technologies Pvt Ltd</a></h5>
                  </header>
                  <div class="meta"><span class="date-range"><time>May 2016</time>  –  <time>July 2016</time> (3 months)</span><span class="location">Bengaluru Area, India</span>
                  </div>
                  <p class="description" data-section="pastPositions">Automation of Operational Tasks in Fulfilment team</p>
                </li>
                <li class="position" data-section="pastPositionsDetails">
                  <header>
                    <h4 class="item-title"><a href="https://www.linkedin.com/title/dev-intern?trk=pprofile_title" data-tracking-control-name="pp_title">Dev Intern</a></h4>
                    <h5 class="item-subtitle">W3 Shastra</h5>
                  </header>
                  <div class="meta"><span class="date-range"><time>June 2015</time>  –  <time>July 2015</time> (2 months)</span>
                  </div>
                  <p class="description" data-section="pastPositions">Building a Book Suggesting Website</p>
                </li>
              </ul>
            </section>
            <section id="education" data-section="educationsDetails" class="profile-section">
              <h3 class="title">Education</h3>
              <ul class="schools">
                <li class="school">
                  <header>
                    <h4 class="item-title">CVR College Of Engineering</h4>
                    <h5 class="item-subtitle"><span class="translated translation" data-field-name="Education.DegreeName">Bachelor of Technology (BTech), Computer Science, Distinction</span><span class="original translation" data-field-name="Education.DegreeName">Bachelor of Technology (BTech), Computer Science, Distinction</span></h5>
                  </header>
                  <div class="meta"><span class="date-range"><time>2013</time>  –  <time>2017</time></span>
                  </div>
                  <div class="description" data-section="educations">
                    <p>Activities and Societies: pro&#39;grammar&#39; competition winner HackerRank club creator/organizer Organized CODE-A-BOT competition in Ciencia 2k16 Active Computer Society of India Volunteer Founder and Captain of Mozilla CVR Club</p>
                  </div>
                </li>
                <li class="school">
                  <header>
                    <h4 class="item-title">Narayana Junior College</h4>
                    <h5 class="item-subtitle"><span class="translated translation" data-field-name="Education.DegreeName">State Board of Intermediate Education, Mathematics, Physics and Chemistry, 94</span><span class="original translation" data-field-name="Education.DegreeName">State Board of Intermediate Education, Mathematics, Physics and Chemistry, 94</span></h5>
                  </header>
                  <div class="meta"><span class="date-range"><time>2011</time>  –  <time>2013</time></span>
                  </div>
                </li>
                <li class="school">
                  <header>
                    <h4 class="item-title">Ramadevi Public School</h4>
                    <h5 class="item-subtitle"><span class="translated translation" data-field-name="Education.DegreeName">Indian Certificate of Secondary Education, High School/Secondary Diplomas and Certificates, A</span><span class="original translation" data-field-name="Education.DegreeName">Indian Certificate of Secondary Education, High School/Secondary Diplomas and Certificates, A</span></h5>
                  </header>
                  <div class="meta"><span class="date-range"><time>2006</time>  –  <time>2011</time></span>
                  </div>
                  <div class="description" data-section="educations">
                    <p>Member of Prefectorial Board. Held responsibility for proper execution of special events and hospitality provided to the guests.
                      <br>
                      <br>Main organizer of Robotics Explora, a science exhibition held by school computer science departments for demonstration of evolving robotic technology.</p>
                      <p>Activities and Societies: Robotics Explora organizer, General Event Organizing Commitee, Prefect, Athelete</p>
                    </div>
                  </li>
                </ul>
              </section>
              <section id="volunteering" data-section="volunteering" class="profile-section">
                <h3 class="title">Volunteer Experience &amp; Causes</h3>
                <ul>
                  <li class="position">
                    <header>
                      <h5 class="logo"><a href="https://www.linkedin.com/company/computer-society-of-india?trk=ppro_cprof" data-tracking-control-name="pp_volunteering_position_img"><img class="lazy-load" alt="Computer Society of India"></a></h5>
                      <h4 class="item-title">Student coordinator</h4>
                      <h5 class="item-subtitle"><a href="https://www.linkedin.com/company/computer-society-of-india?trk=ppro_cprof" data-tracking-control-name="pp_volunteering_company">Computer Society of India</a></h5>
                    </header>
                    <div class="meta "><span class="date-range"><time>November 2015</time>  –  Present (2 years 6 months)</span><span class="cause">Science and Technology</span>
                    </div>
                  </li>
                  <li class="position">
                    <header>
                      <h5 class="logo"><a href="https://www.linkedin.com/company/mozilla-corporation?trk=ppro_cprof" data-tracking-control-name="pp_volunteering_position_img"><img class="lazy-load" alt="Mozilla"></a></h5>
                      <h4 class="item-title">Firefox Student Ambassador</h4>
                      <h5 class="item-subtitle"><a href="https://www.linkedin.com/company/mozilla-corporation?trk=ppro_cprof" data-tracking-control-name="pp_volunteering_company">Mozilla</a></h5>
                    </header>
                    <div class="meta "><span class="date-range"><time>June 2015</time>  –  <time>September 2016</time> (1 year 4 months)</span><span class="cause">Science and Technology</span>
                    </div>
                  </li>
                </ul>
                <div class="extra-section">
                  <h4 class="title">Causes Mani Kumar Reddy cares about:</h4>
                  <ul>
                    <li>Education</li>
                    <li>Science and Technology</li>
                  </ul>
                </div>
              </section>
              <section id="skills" data-section="skills" class="profile-section skills-section">
                <h3 class="title">Skills</h3>
                <ul class="pills">
                  <input type="checkbox" id="skills-expander-state-checkbox" class="expander-state-checkbox" />
                  <li class="skill"><a href="https://www.linkedin.com/learning/topics/java?trk=pprofile_topic" title="Java" data-tracking-control-name="pp_skill_url"><span class="wrap">Java</span></a>
                  </li>
                  <li class="skill"><a href="https://www.linkedin.com/learning/topics/c-2?trk=pprofile_topic" title="C" data-tracking-control-name="pp_skill_url"><span class="wrap">C</span></a>
                  </li>
                  <li class="skill"><a href="https://www.linkedin.com/learning/topics/c-plus-plus?trk=pprofile_topic" title="C++" data-tracking-control-name="pp_skill_url"><span class="wrap">C++</span></a>
                  </li>
                  <li class="skill"><a href="https://www.linkedin.com/learning/topics/ruby-on-rails?trk=pprofile_topic" title="Ruby on Rails" data-tracking-control-name="pp_skill_url"><span class="wrap">Ruby on Rails</span></a>
                  </li>
                  <li class="skill"><a href="https://www.linkedin.com/learning/topics/sql?trk=pprofile_topic" title="SQL" data-tracking-control-name="pp_skill_url"><span class="wrap">SQL</span></a>
                  </li>
                  <li class="skill"><span class="wrap">RDBMS</span>
                  </li>
                  <li class="skill"><span class="wrap">JavaSE</span>
                  </li>
                  <li class="skill"><a href="https://www.linkedin.com/learning/topics/javascript?trk=pprofile_topic" title="JavaScript" data-tracking-control-name="pp_skill_url"><span class="wrap">JavaScript</span></a>
                  </li>
                  <li class="skill"><a href="https://www.linkedin.com/learning/topics/python?trk=pprofile_topic" title="Python" data-tracking-control-name="pp_skill_url"><span class="wrap">Python</span></a>
                  </li>
                  <li class="skill"><span class="wrap">Algorithm Development</span>
                  </li>
                  <li class="skill"><span class="wrap">Programming Languages</span>
                  </li>
                  <li class="skill"><span class="wrap">Object-oriented Languages</span>
                  </li>
                  <li class="skill"><a href="https://www.linkedin.com/learning/topics/html?trk=pprofile_topic" title="HTML" data-tracking-control-name="pp_skill_url"><span class="wrap">HTML</span></a>
                  </li>
                  <li class="skill"><a href="https://www.linkedin.com/learning/topics/linux-2?trk=pprofile_topic" title="Linux" data-tracking-control-name="pp_skill_url"><span class="wrap">Linux</span></a>
                  </li>
                  <li class="skill"><a href="https://www.linkedin.com/learning/topics/leadership-skills?trk=pprofile_topic" title="Leadership" data-tracking-control-name="pp_skill_url"><span class="wrap">Leadership</span></a>
                  </li>
                  <li class="skill see-more">
                    <label for="skills-expander-state-checkbox" class="wrap">See 8+</label>
                  </li>
                  <li class="skill extra"><span class="wrap">Data Structures</span>
                  </li>
                  <li class="skill extra"><a href="https://www.linkedin.com/learning/topics/ruby?trk=pprofile_topic" title="Ruby" data-tracking-control-name="pp_skill_url"><span class="wrap">Ruby</span></a>
                  </li>
                  <li class="skill extra"><span class="wrap">Programming</span>
                  </li>
                  <li class="skill extra"><a href="https://www.linkedin.com/learning/topics/datenbankentwicklung-2?trk=pprofile_topic" title="Database Design" data-tracking-control-name="pp_skill_url"><span class="wrap">Database Design</span></a>
                  </li>
                  <li class="skill extra"><span class="wrap">Software Development</span>
                  </li>
                  <li class="skill extra"><span class="wrap">PL/SQL</span>
                  </li>
                  <li class="skill extra"><a href="https://www.linkedin.com/learning/topics/java?trk=pprofile_topic" title="Core Java" data-tracking-control-name="pp_skill_url"><span class="wrap">Core Java</span></a>
                  </li>
                  <li class="skill extra"><a href="https://www.linkedin.com/learning/topics/frontend-webentwicklung?trk=pprofile_topic" title="Web Development" data-tracking-control-name="pp_skill_url"><span class="wrap">Web Development</span></a>
                  </li>
                  <li class="skill see-less extra">
                    <label for="skills-expander-state-checkbox" class="wrap">See less</label>
                  </li>
                </ul>
                <div class="translation-voter-wrap">
                  <div class="translation-voter"><span>How&#39;s this translation?</span>
                    <ul class="voter-form">
                      <li class="action option positive"><span class="action positive">Great</span>
                      </li>
                      <li class="separator">&#8226;</li>
                      <li class="action option negative"><span class="action negative">Has errors</span>
                      </li>
                    </ul>
                  </div>
                  <div class="translation-voter-response">Thanks for your help!</div>
                </div>
              </section>
              <section id="certifications" data-section="certifications" class="profile-section">
                <h3 class="title">Certifications</h3>
                <ul class="certifications">
                  <li class="certification">
                    <header>
                      <h5 class="logo"><a href="https://www.linkedin.com/company/code-school?trk=ppro_cprof" data-tracking-control-name="pp_certification_img"><img class="lazy-load" alt=""></a></h5>
                      <h4 class="item-title"><a href="https://www.linkedin.com/redir/redirect?url=https%3A%2F%2Fwww%2Ecodeschool%2Ecom%2Fcourses%2Fflying-through-python&amp;urlhash=dcLR&amp;trk=profile_certification_title" class="external-link" data-tracking-control-name="pp_certification_title">Flying Through Python</a></h4>
                      <h5 class="item-subtitle"><a href="https://www.linkedin.com/company/code-school?trk=ppro_cprof" data-tracking-control-name="pp_certification_subtitle">Code School</a></h5>
                      <div class="meta"><span class="date-range"><time>November 2016</time>  –  Present</span>
                      </div>
                    </header>
                  </li>
                  <li class="certification">
                    <header>
                      <h5 class="logo"><a href="https://www.linkedin.com/company/code-school?trk=ppro_cprof" data-tracking-control-name="pp_certification_img"><img class="lazy-load" alt=""></a></h5>
                      <h4 class="item-title"><a href="https://www.linkedin.com/redir/redirect?url=https%3A%2F%2Fwww%2Ecodeschool%2Ecom%2Fcourses%2Fgit-real&amp;urlhash=jZqW&amp;trk=profile_certification_title" class="external-link" data-tracking-control-name="pp_certification_title">Git Real</a></h4>
                      <h5 class="item-subtitle"><a href="https://www.linkedin.com/company/code-school?trk=ppro_cprof" data-tracking-control-name="pp_certification_subtitle">Code School</a></h5>
                      <div class="meta"><span class="date-range"><time>November 2016</time>  –  Present</span>
                      </div>
                    </header>
                  </li>
                  <li class="certification">
                    <header>
                      <h5 class="logo"><a href="https://www.linkedin.com/company/code-school?trk=ppro_cprof" data-tracking-control-name="pp_certification_img"><img class="lazy-load" alt=""></a></h5>
                      <h4 class="item-title"><a href="https://www.linkedin.com/redir/redirect?url=https%3A%2F%2Fwww%2Ecodeschool%2Ecom%2Fcourses%2Fgit-real-2&amp;urlhash=6vQ9&amp;trk=profile_certification_title" class="external-link" data-tracking-control-name="pp_certification_title">Git Real 2</a></h4>
                      <h5 class="item-subtitle"><a href="https://www.linkedin.com/company/code-school?trk=ppro_cprof" data-tracking-control-name="pp_certification_subtitle">Code School</a></h5>
                      <div class="meta"><span class="date-range"><time>November 2016</time>  –  Present</span>
                      </div>
                    </header>
                  </li>
                  <li class="certification">
                    <header>
                      <h5 class="logo"><a href="https://www.linkedin.com/company/code-school?trk=ppro_cprof" data-tracking-control-name="pp_certification_img"><img class="lazy-load" alt=""></a></h5>
                      <h4 class="item-title"><a href="https://www.linkedin.com/redir/redirect?url=https%3A%2F%2Fwww%2Ecodeschool%2Ecom%2Fcourses%2Fmastering-github&amp;urlhash=KT0V&amp;trk=profile_certification_title" class="external-link" data-tracking-control-name="pp_certification_title">Mastering GitHub</a></h4>
                      <h5 class="item-subtitle"><a href="https://www.linkedin.com/company/code-school?trk=ppro_cprof" data-tracking-control-name="pp_certification_subtitle">Code School</a></h5>
                      <div class="meta"><span class="date-range"><time>November 2016</time>  –  Present</span>
                      </div>
                    </header>
                  </li>
                  <li class="certification">
                    <header>
                      <h5 class="logo"><a href="https://www.linkedin.com/company/code-school?trk=ppro_cprof" data-tracking-control-name="pp_certification_img"><img class="lazy-load" alt=""></a></h5>
                      <h4 class="item-title"><a href="https://www.linkedin.com/redir/redirect?url=https%3A%2F%2Fwww%2Ecodeschool%2Ecom%2Fcourses%2Fthe-sequel-to-sql&amp;urlhash=bf_1&amp;trk=profile_certification_title" class="external-link" data-tracking-control-name="pp_certification_title">The Sequel to SQL</a></h4>
                      <h5 class="item-subtitle"><a href="https://www.linkedin.com/company/code-school?trk=ppro_cprof" data-tracking-control-name="pp_certification_subtitle">Code School</a></h5>
                      <div class="meta"><span class="date-range"><time>November 2016</time>  –  Present</span>
                      </div>
                    </header>
                  </li>
                  <li class="certification">
                    <header>
                      <h5 class="logo"><a href="https://www.linkedin.com/company/udemy?trk=ppro_cprof" data-tracking-control-name="pp_certification_img"><img class="lazy-load" alt=""></a></h5>
                      <h4 class="item-title"><a href="https://www.linkedin.com/redir/redirect?url=https%3A%2F%2Fwww%2Eudemy%2Ecom%2Fcertificate%2FUC-OODTZLI3%2F&amp;urlhash=7Nlo&amp;trk=profile_certification_title" class="external-link" data-tracking-control-name="pp_certification_title">Databases and SQL Querying Online Course</a></h4>
                      <h5 class="item-subtitle"><a href="https://www.linkedin.com/company/udemy?trk=ppro_cprof" data-tracking-control-name="pp_certification_subtitle">Udemy, </a>License UC-OODTZLI3</h5>
                      <div class="meta"><span class="date-range"><time>October 2016</time>  –  Present</span>
                      </div>
                    </header>
                  </li>
                  <li class="certification">
                    <header>
                      <h5 class="logo"><a href="https://www.linkedin.com/company/udemy?trk=ppro_cprof" data-tracking-control-name="pp_certification_img"><img class="lazy-load" alt=""></a></h5>
                      <h4 class="item-title"><a href="https://www.linkedin.com/redir/redirect?url=http%3A%2F%2Fude%2Emy%2FUC-7085RZSP&amp;urlhash=zb2y&amp;trk=profile_certification_title" class="external-link" data-tracking-control-name="pp_certification_title">PHP and MySQL Online Course</a></h4>
                      <h5 class="item-subtitle"><a href="https://www.linkedin.com/company/udemy?trk=ppro_cprof" data-tracking-control-name="pp_certification_subtitle">Udemy, </a>License UC-7085RZSP</h5>
                      <div class="meta"><span class="date-range"><time>October 2016</time>  –  Present</span>
                      </div>
                    </header>
                  </li>
                  <li class="certification">
                    <header>
                      <h5 class="logo"><a href="https://www.linkedin.com/company/edx?trk=ppro_cprof" data-tracking-control-name="pp_certification_img"><img class="lazy-load" alt=""></a></h5>
                      <h4 class="item-title"><a href="https://www.linkedin.com/redir/redirect?url=https%3A%2F%2Fs3%2Eamazonaws%2Ecom%2Fverify%2Eedx%2Eorg%2Fdownloads%2F07bce010dfc6410888cc1e19807ad625%2FCertificate%2Epdf&amp;urlhash=iWis&amp;trk=profile_certification_title" class="external-link" data-tracking-control-name="pp_certification_title">edX Honor Code Certificate for Introduction to Computer Science</a></h4>
                      <h5 class="item-subtitle"><a href="https://www.linkedin.com/company/edx?trk=ppro_cprof" data-tracking-control-name="pp_certification_subtitle">edX, </a>License CS50x</h5>
                      <div class="meta"><span class="date-range"><time>January 2015</time>  –  Present</span>
                      </div>
                    </header>
                  </li>
                  <li class="certification">
                    <header>
                      <h5 class="logo"><a href="https://www.linkedin.com/company/edx?trk=ppro_cprof" data-tracking-control-name="pp_certification_img"><img class="lazy-load" alt=""></a></h5>
                      <h4 class="item-title"><a href="https://www.linkedin.com/redir/redirect?url=https%3A%2F%2Fs3%2Eamazonaws%2Ecom%2Fverify%2Eedx%2Eorg%2Fdownloads%2F897dc24bcc0c4b228ec743903424a551%2FCertificate%2Epdf&amp;urlhash=QBm2&amp;trk=profile_certification_title" class="external-link" data-tracking-control-name="pp_certification_title">edX Honor Code Certificate for Introduction to Linux</a></h4>
                      <h5 class="item-subtitle"><a href="https://www.linkedin.com/company/edx?trk=ppro_cprof" data-tracking-control-name="pp_certification_subtitle">edX, </a>License LFS101x</h5>
                      <div class="meta"><span class="date-range"><time>December 2014</time>  –  Present</span>
                      </div>
                    </header>
                  </li>
                  <li class="certification">
                    <header>
                      <h5 class="logo"><a href="https://www.linkedin.com/company/edx?trk=ppro_cprof" data-tracking-control-name="pp_certification_img"><img class="lazy-load" alt=""></a></h5>
                      <h4 class="item-title"><a href="https://www.linkedin.com/redir/redirect?url=https%3A%2F%2Fs3%2Eamazonaws%2Ecom%2Fverify%2Eedx%2Eorg%2Fdownloads%2Fc6219d6464e94c0da13eaceaa8795e6a%2FCertificate%2Epdf&amp;urlhash=auvI&amp;trk=profile_certification_title" class="external-link" data-tracking-control-name="pp_certification_title">edX Honor Code Certificate for Introduction to Computing with Java</a></h4>
                      <h5 class="item-subtitle"><a href="https://www.linkedin.com/company/edx?trk=ppro_cprof" data-tracking-control-name="pp_certification_subtitle">edX, </a>License COMP102x</h5>
                      <div class="meta"><span class="date-range"><time>September 2014</time>  –  Present</span>
                      </div>
                    </header>
                  </li>
                  <li class="certification">
                    <header>
                      <h5 class="logo"><a href="https://www.linkedin.com/company/edx?trk=ppro_cprof" data-tracking-control-name="pp_certification_img"><img class="lazy-load" alt=""></a></h5>
                      <h4 class="item-title"><a href="https://www.linkedin.com/redir/redirect?url=https%3A%2F%2Fs3%2Eamazonaws%2Ecom%2Fverify%2Eedx%2Eorg%2Fdownloads%2F5212ee6eed79413a9bfea0d5b1ef82f4%2FCertificate%2Epdf&amp;urlhash=QQHe&amp;trk=profile_certification_title" class="external-link" data-tracking-control-name="pp_certification_title">edX Honor Code Certificate for The Science of Everyday Thinking</a></h4>
                      <h5 class="item-subtitle"><a href="https://www.linkedin.com/company/edx?trk=ppro_cprof" data-tracking-control-name="pp_certification_subtitle">edX, </a>License Think101x</h5>
                      <div class="meta"><span class="date-range"><time>June 2014</time>  –  Present</span>
                      </div>
                    </header>
                  </li>
                </ul>
              </section>
              <section id="languages" data-section="languages" class="profile-section">
                <h3 class="title">Languages</h3>
                <ul>
                  <li class="language">
                    <div class="wrap">
                      <h4 class="name">English</h4>
                      <p class="proficiency">Full professional proficiency</p>
                    </div>
                  </li>
                  <li class="language">
                    <div class="wrap">
                      <h4 class="name">Telugu</h4>
                      <p class="proficiency">Native or bilingual proficiency</p>
                    </div>
                  </li>
                  <li class="language">
                    <div class="wrap">
                      <h4 class="name">Hindi</h4>
                      <p class="proficiency">Limited working proficiency</p>
                    </div>
                  </li>
                </ul>
              </section>
              <section id="projects" data-section="projects" class="profile-section">
                <h3 class="title">Projects</h3>
                <ul>
                  <li class="project">
                    <header>
                      <h4 class="item-title"><a href="https://www.linkedin.com/redir/redirect?url=https%3A%2F%2Fgithub%2Ecom%2FKmanikumarreddy%2Fbluetooth-home-automation&amp;urlhash=zk6_&amp;trk=prof-project-name-title" title="Home Automation Using Bluetooth" class="external-link" data-tracking-control-name="pp_project_title" rel="nofollow">Home Automation Using Bluetooth</a></h4>
                    </header>
                    <div class="meta"><span class="date-range"><time>August 2016</time>  –  <time>August 2016</time></span>
                    </div>
                    <p class="description"></p>
                    <dl class="contributors"><dt>Team members: </dt>
                      <dd>
                        <ul>
                          <li class="contributor"><a href="https://in.linkedin.com/in/kmanikumarreddy" data-tracking-control-name="pp_project_contributor">Mani Kumar Reddy Kancharla</a>,</li>
                          <li class="contributor"><a href="https://in.linkedin.com/in/arjun-k-761324ab" data-tracking-control-name="pp_project_contributor">arjun k</a>,</li>
                          <li class="contributor">Pramod Deshpande</li>
                        </ul>
                      </dd>
                    </dl>
                  </li>
                </ul>
              </section>
              <section id="scores" data-section="scores" class="profile-section">
                <h3 class="title">Test Scores</h3>
                <ul>
                  <li class="score">
                    <header>
                      <h4 class="item-title">Graduate Record Examination(GRE): General Test</h4>
                      <h5 class="item-subtitle">Score: 313</h5>
                    </header>
                    <div class="meta no-image"><span class="date-range"><time>September 2016</time></span>
                    </div>
                    <p class="description"></p>
                  </li>
                </ul>
              </section>
              <section id="organizations" data-section="organizations" class="profile-section">
                <h3 class="title">Organizations</h3>
                <ul>
                  <li>
                    <header>
                      <h4 class="item-title">Mozilla</h4>
                      <h5 class="item-subtitle">Firefox Student Ambassador(Trainee)</h5>
                    </header>
                    <div class="meta no-image"><span class="date-range">Starting <time>January 2016</time></span>
                    </div>
                  </li>
                  <li>
                    <header>
                      <h4 class="item-title">Computer Society of India</h4>
                      <h5 class="item-subtitle">Student Volunteer</h5>
                    </header>
                    <div class="meta no-image"><span class="date-range">Starting <time>November 2015</time></span>
                    </div>
                  </li>
                </ul>
              </section>
            </div>
          </div>
        </main>

      </div>
    </body>

    </html>