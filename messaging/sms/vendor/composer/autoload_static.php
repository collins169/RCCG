<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb44644835d09aea2322e01e0bfbdc68c
{
    public static $classMap = array (
        'AbstractApi' => __DIR__ . '/../..' . '/Hubtel/AbstractApi.php',
        'AbstractHttpClient' => __DIR__ . '/../..' . '/Hubtel/AbstractHttpClient.php',
        'AccountApi' => __DIR__ . '/../..' . '/Hubtel/AccountApi.php',
        'AccountContact' => __DIR__ . '/../..' . '/Hubtel/AccountContact.php',
        'AccountProfile' => __DIR__ . '/../..' . '/Hubtel/AccountProfile.php',
        'Action' => __DIR__ . '/../..' . '/Hubtel/Action.php',
        'ApiHost' => __DIR__ . '/../..' . '/Hubtel/ApiHost.php',
        'ApiList' => __DIR__ . '/../..' . '/Hubtel/ApiList.php',
        'BasicAuth' => __DIR__ . '/../..' . '/Hubtel/BasicAuth.php',
        'BasicHttpClient' => __DIR__ . '/../..' . '/Hubtel/BasicHttpClient.php',
        'BasicRequestHandler' => __DIR__ . '/../..' . '/Hubtel/BasicRequestHandler.php',
        'Campaign' => __DIR__ . '/../..' . '/Hubtel/Campaign.php',
        'CommonUtil' => __DIR__ . '/../..' . '/Hubtel/CommonUtil.php',
        'ConsoleLogger' => __DIR__ . '/../..' . '/Hubtel/ConsoleLogger.php',
        'Contact' => __DIR__ . '/../..' . '/Hubtel/Contact.php',
        'ContactApi' => __DIR__ . '/../..' . '/Hubtel/ContactApi.php',
        'ContactGroup' => __DIR__ . '/../..' . '/Hubtel/ContactGroup.php',
        'ContentApi' => __DIR__ . '/../..' . '/Hubtel/ContentApi.php',
        'ContentFolder' => __DIR__ . '/../..' . '/Hubtel/ContentFolder.php',
        'ContentLibrary' => __DIR__ . '/../..' . '/Hubtel/ContentLibrary.php',
        'ContentMedia' => __DIR__ . '/../..' . '/Hubtel/ContentMedia.php',
        'CurlException' => __DIR__ . '/../..' . '/Hubtel/CurlException.php',
        'Enum' => __DIR__ . '/../..' . '/Hubtel/Enum.php',
        'FileExtensionMimeTypeMapping' => __DIR__ . '/../..' . '/Hubtel/FileExtensionMimeTypeMapping.php',
        'HttpDelete' => __DIR__ . '/../..' . '/Hubtel/HttpDelete.php',
        'HttpGet' => __DIR__ . '/../..' . '/Hubtel/HttpGet.php',
        'HttpHead' => __DIR__ . '/../..' . '/Hubtel/HttpHead.php',
        'HttpPost' => __DIR__ . '/../..' . '/Hubtel/HttpPost.php',
        'HttpPut' => __DIR__ . '/../..' . '/Hubtel/HttpPut.php',
        'HttpRequest' => __DIR__ . '/../..' . '/Hubtel/HttpRequest.php',
        'HttpResponse' => __DIR__ . '/../..' . '/Hubtel/HttpResponse.php',
        'HttpStatusCode' => __DIR__ . '/../..' . '/Hubtel/HttpStatusCode.php',
        'Invoice' => __DIR__ . '/../..' . '/Hubtel/Invoice.php',
        'JsonHelper' => __DIR__ . '/../..' . '/Hubtel/JsonHelper.php',
        'MediaInfo' => __DIR__ . '/../..' . '/Hubtel/MediaInfo.php',
        'Message' => __DIR__ . '/../..' . '/Hubtel/Message.php',
        'MessageDirection' => __DIR__ . '/../..' . '/Hubtel/MessageDirection.php',
        'MessageResponse' => __DIR__ . '/../..' . '/Hubtel/MessageResponse.php',
        'MessageTemplate' => __DIR__ . '/../..' . '/Hubtel/MessageTemplate.php',
        'MessageType' => __DIR__ . '/../..' . '/Hubtel/MessageType.php',
        'MessagingApi' => __DIR__ . '/../..' . '/Hubtel/MessagingApi.php',
        'MoKeyWord' => __DIR__ . '/../..' . '/Hubtel/MoKeyWord.php',
        'NumberPlan' => __DIR__ . '/../..' . '/Hubtel/NumberPlan.php',
        'NumberPlanItem' => __DIR__ . '/../..' . '/Hubtel/NumberPlanItem.php',
        'OAuth' => __DIR__ . '/../..' . '/Hubtel/OAuth.php',
        'RequestHandler' => __DIR__ . '/../..' . '/Hubtel/RequestHandler.php',
        'RequestLogger' => __DIR__ . '/../..' . '/Hubtel/RequestLogger.php',
        'Sender' => __DIR__ . '/../..' . '/Hubtel/Sender.php',
        'Service' => __DIR__ . '/../..' . '/Hubtel/Service.php',
        'ServiceType' => __DIR__ . '/../..' . '/Hubtel/ServiceType.php',
        'Setting' => __DIR__ . '/../..' . '/Hubtel/Setting.php',
        'SupportApi' => __DIR__ . '/../..' . '/Hubtel/SupportApi.php',
        'Tag' => __DIR__ . '/../..' . '/Hubtel/Tag.php',
        'Ticket' => __DIR__ . '/../..' . '/Hubtel/Ticket.php',
        'TicketResponse' => __DIR__ . '/../..' . '/Hubtel/TicketResponse.php',
        'Topup' => __DIR__ . '/../..' . '/Hubtel/Topup.php',
        'TopupLocation' => __DIR__ . '/../..' . '/Hubtel/TopupLocation.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInitb44644835d09aea2322e01e0bfbdc68c::$classMap;

        }, null, ClassLoader::class);
    }
}
