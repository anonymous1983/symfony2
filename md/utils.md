```
{
      "id":1,
      "titre":"Mercedes classe c garantie 2017",
      "description":"test test test",
      "url":"a036940c7fa53e0b8ba988baf2f9836a192fc3c1.jpg",
      "date":"2015-10-14 15:02:08",
      "status":null
}
```

http://npmasters.com/2012/11/25/Symfony2-Rest-FOSRestBundle.html

http://williamdurand.fr/2012/08/02/rest-apis-with-symfony2-the-right-way/

http://obtao.com/blog/2013/12/creer-une-api-rest-dans-une-application-symfony/

**Documentation :**

https://github.com/nelmio/NelmioApiDocBundle/blob/master/Resources/doc/the-apidoc-annotation.md

http://swagger.io/

http://afsy.fr/avent/2013/06-best-practices-pour-vos-apis-rest-http-avec-symfony2

https://github.com/marmelab/ng-admin

**Symfony HTTP Code :**

- http://api.symfony.com/2.7/Symfony/Component/HttpFoundation/Response.html
- https://fr.wikipedia.org/wiki/Liste_des_codes_HTTP

**FosRESTBundle view header :**

http://symfony.com/doc/current/bundles/FOSRestBundle/2-the-view-layer.html



**Authentication  WSSE / Salt :**

http://obtao.com/blog/2014/02/configurer-wsse-sur-symfony-avec-le-fosrestbundle/

Authentication  OAuth2 :
https://github.com/FriendsOfSymfony/FOSOAuthServerBundle


**FosUserBundle :**

http://www.grafikart.fr/tutoriels/symfony/gestion-user-fosuserbundle-383


**Bien utiliser les commandes console de Symfony2**

http://blog.keiruaprod.fr/2012/03/21/bien-utiliser-les-commandes-console-de-symfony2/


**Creat Bundle (Application-specific bundles / Reusable bundles):**

http://symfony.com/doc/current/cookbook/bundles/best_practices.html


**Nomage Best Practice :**

http://www.php-fig.org/psr/psr-4/

http://welcometothebundle.com/speedup-symfony-functional-tests-phpunit/



**to creat user**

`php app/console fos:user:create admin admin@symfony.com admin`

`php app/console fos:user:active admin`

`php ^pp/console fos:user:promote admin ROLE_ADMIN`


**to creat new entity comment**

`php app/console doctrine:generate:entity`

`php app/console doctrine:schema:update --force`

`php app/console generate:doctrine:crud AAPlatformBundle:Comment`

