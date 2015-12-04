# symfony2

* Version : 2.7.*


API REST
-----------------

### Bundles
- [FOSRestBundle v1.7](https://github.com/FriendsOfSymfony/FOSRestBundle/tree/1.7)
- [JMSSerializerBundle](https://github.com/schmittjoh/JMSSerializerBundle/tree/1.1.0)

### Articles
- [Symfony2 & Rest with FOSRestBundle](http://npmasters.com/2012/11/25/Symfony2-Rest-FOSRestBundle.html)

#### Settin up the FOSRestBundle Bundle [src](http://symfony.com/doc/master/bundles/FOSRestBundle/1-setting_up_the_bundle.html)


A) Download the Bundle
----------------------

Open a command console, enter your project directory and execute the
following command to download the latest stable version of this bundle:

.. code-block:: bash

    $ composer require friendsofsymfony/rest-bundle

This command requires you to have Composer installed globally, as explained
in the `installation chapter`_ of the Composer documentation.

B) Enable the Bundle
--------------------

Then, enable the bundle by adding the following line in the ``app/AppKernel.php``
file of your project:

.. code-block:: php

    // app/AppKernel.php
    class AppKernel extends Kernel
    {
        public function registerBundles()
        {
            $bundles = array(
                // ...
                new FOS\RestBundle\FOSRestBundle(),
            );

            // ...
        }
    }

C) Enable a Serializer
----------------------

This bundle needs a serializer to work correctly. In most cases,
you'll need to enable a serializer or install one. This bundle tries
the following (in the given order) to determine the serializer to use:

#. The one you configured using ``fos_rest.service.serializer`` (if you did).
#. The JMS serializer, if the `JMSSerializerBundle`_ is available (and registered).
#. The `Symfony Serializer`_ if it's enabled (or any service called ``serializer``).

That was it!