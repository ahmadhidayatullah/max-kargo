<body class="email" style="margin: 0;font-size: 17px;line-height: 1.52947;font-weight: 400;letter-spacing: -.021em;font-family: &quot;SS Pro&quot;,FontAwesome,&quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif;background-color: #fff;color: #333;font-style: normal;">
    <nav id="globalnav" class="globalnav" style="display: block;padding-top: 40px;border-bottom: 1px solid #d6d6d6;height: 54px;position: relative;z-index: 999999;background: #fff;-webkit-transition: background .35s linear,height .35s ease-in .2s;transition: background .35s linear,height .35s ease-in .2s;border: none!important;">
        <div class="uk-container uk-width-large-8-10 uk-width-small-1-1 uk-container-center" style="width: 80%;-webkit-box-sizing: border-box;box-sizing: border-box;max-width: 980px;padding: 0 25px;margin-left: auto;margin-right: auto;">
           <div class="uk-text-center" style="text-align: center!important;">

           </div>
        </div>
    </nav>
    <div class="main-content uk-text-center" style="padding-top: 40px;text-align: center!important;">
        <div class="uk-container uk-width-large-8-10 uk-width-small-1-1 uk-container-center" style="width: 80%;-webkit-box-sizing: border-box;box-sizing: border-box;max-width: 980px;padding: 0 25px;margin-left: auto;margin-right: auto;">
            <div class="text" style="padding-bottom: 20px;">
                <h2 style="margin: 0 0 15px 0;font-family: -apple-system, 'Myriad Pro', sans-serif;font-weight: 400;color: #444;text-transform: none;line-height: 30px;font-size: 24px;orphans: 3;widows: 3;page-break-after: avoid;">Hallo {{ $name }}!</h2>
                <p style="margin: 0 0 6px 0!important;margin-top: 15px;orphans: 3;widows: 3;font-weight: 300;font-family: 'Myriad Pro', sans-serif;">Terimah kasih telah menggunakan jasa kami.</p>
                <p style="margin: 0 0 6px 0!important;margin-top: 15px;orphans: 3;widows: 3;font-weight: 300;font-family: 'Myriad Pro', sans-serif;">Status orderan dengan nomor order <b>{{ $no_order }}</b> anda saat ini.</p>
            </div>
            <div class="code" style="background: #3e3e3e;width: 200px;margin: 0 auto;padding: 20px;color: #fff;border-radius: 4px;">
                <h4 style="margin: 0;font-family: 'Myriad Pro', sans-serif;font-weight: 400;color: #fff;text-transform: none;line-height: 22px;font-size: 16px;">Status Orderan</h4>
                <p style="margin: 0;margin-top: 15px;orphans: 3;widows: 3;font-weight: 300;font-family: 'Myriad Pro', sans-serif;font-size: 40px, sans-serif;">{{ $status }}</p>
            </div>
            <br/>
            <div class="text" style="padding-bottom: 20px;">
                <p style="margin: 0 0 6px 0!important;margin-top: 15px;orphans: 3;widows: 3;font-weight: 300;font-family: 'Myriad Pro', sans-serif;">Silahkan menggunakan fitur <a href="{{route('search')}}">Telusur</a> untuk memastikan,Terima kasih.</p>
            </div>
        </div>
    </div>
    <footer id="globalfooter" class="globalfooter" style="display: block;color: #fff;text-align: center;padding-top: 30px;background: #fff!important;padding: 50px 0;">
        <div class="uk-container uk-width-large-8-10 uk-width-small-1-1 uk-container-center" style="width: 80%;-webkit-box-sizing: border-box;box-sizing: border-box;max-width: 980px;padding: 0 25px;margin-left: auto;margin-right: auto;">
            <div class="social-icon">
                <ul style="margin: 0;padding-left: 30px;padding: 0;list-style: none;">
                    {{-- <li style="display: inline-block;"><a href="#" style="background: 0 0;color: #07d;text-decoration: underline;cursor: pointer;padding: 0 10px!important;display: block!important;"></a></li> --}}
                    <li style="display: inline-block;color: #07d;text-decoration: underline;">085223408017</li>
                    <li style="display: inline-block;color: #07d;text-decoration: underline;">maldy@gmail.com</li>
                </ul>
            </div>
            <p style="margin: 0 0 15px 0;margin-top: 15px;orphans: 3;widows: 3;font-weight: 300;font-family: 'Myriad Pro', sans-serif;color: #333;">© 2018 Max-Cargo.</p>
        </div>
    </footer>

</body>

<style>

</style>
