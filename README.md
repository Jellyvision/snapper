# Snapper

## A drop-dead simple image sharing service

Snapper is a tool that is meant to do exactly one thing: Share images.  That
isn't awfully riveting, so have a gander at this list of things that Snapper
__doesn't do__:

* Authentication
* Social sharing
* Provide an API
* Offer hardly any security to speak of

You might say, "wait, this sounds kind of terrible," and you'd probably be
right.  Snapper _is_ terrible for most use cases due to the list above.  I
built Snapper for one specific purpose: __I need a firewalled web app that lets
me quickly share images with my coworkers by dragging and dropping files__.
That's Snapper's single feature, and it does that pretty well.  If you need
something similar, Snapper is for you!

## PHP??!

Yeah, PHP.  No, I don't like the language either.  _But_, PHP does exactly what
I need for this use case, and it runs pretty much everywhere with minimal fuss.
All you need is a MAMP/LAMP/WAMP stack set up and you're off to the races.
Snapper doesn't use a database, so you won't need to worry about setting that
up.

# Disclaimer!

Make really, really sure you know about the security implications of using
Snapper.  __SNAPPER ISN'T SECURE.__ You almost certainly don't want to install
this on any public server because it is so prone to abuse and spamming.  _Only
install Snapper if you trust all of the potential users who will have access to
it._

Snapper is currenty _very_ bare-bones.  Don't be surprise to find bugs.  If you
do, please [file a bug report](https://github.com/jeremyckahn/snapper/issues)
or [submit a Pull Request](https://github.com/jeremyckahn/snapper/pulls)!

## Installation

To install Snapper, just download/`git clone` the files and configure
[MAMP](http://www.mamp.info/en/index.html)/[WAMP](http://www.wampserver.com/en/)/[LAMP](https://help.ubuntu.com/community/ApacheMySQLPHP)
to point to the `snapper/` root.  Snapper requires [Bower](http://bower.io/)
for the front end packages, so make sure that is installed.  When it is, run
this BASH command:

````
bower install
````

That's it.  Navigate to `localhost` and start dropping images.

## How do use Snapper

There really isn't much to it: Open the web page that Snapper is being served
from and drag an image from your file system onto the big gray rectangle.
Snapper will then redirect you to the URL of the uploaded file.

And with that, you have experienced all of the features that Snapper has to
offer.  Enjoy!

## License

Snapper is distibuted by [Jeremy Kahn](http://jeremyckahn.com/) under the [MIT
license](http://opensource.org/licenses/MIT). You are encouraged to use and
modify the code to suit your needs, as well as redistribute it.
