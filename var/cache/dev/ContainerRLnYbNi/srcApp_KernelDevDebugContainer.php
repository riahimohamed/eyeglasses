<?php

namespace ContainerRLnYbNi;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\DependencyInjection\Exception\InvalidArgumentException;
use Symfony\Component\DependencyInjection\Exception\LogicException;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;
use Symfony\Component\DependencyInjection\ParameterBag\FrozenParameterBag;

/**
 * This class has been auto-generated
 * by the Symfony Dependency Injection Component.
 *
 * @final since Symfony 3.3
 */
class srcApp_KernelDevDebugContainer extends Container
{
    private $buildParameters;
    private $containerDir;
    private $parameters = [];
    private $targetDirs = [];
    private $getService;

    public function __construct(array $buildParameters = [], $containerDir = __DIR__)
    {
        $this->getService = \Closure::fromCallable([$this, 'getService']);
        $dir = $this->targetDirs[0] = \dirname($containerDir);
        for ($i = 1; $i <= 4; ++$i) {
            $this->targetDirs[$i] = $dir = \dirname($dir);
        }
        $this->buildParameters = $buildParameters;
        $this->containerDir = $containerDir;
        $this->parameters = $this->getDefaultParameters();

        $this->services = $this->privates = [];
        $this->syntheticIds = [
            'kernel' => true,
        ];
        $this->methodMap = [
            'cache.app' => 'getCache_AppService',
            'cache.system' => 'getCache_SystemService',
            'data_collector.dump' => 'getDataCollector_DumpService',
            'doctrine' => 'getDoctrineService',
            'doctrine.dbal.default_connection' => 'getDoctrine_Dbal_DefaultConnectionService',
            'doctrine.orm.default_entity_manager' => 'getDoctrine_Orm_DefaultEntityManagerService',
            'doctrine_cache.providers.doctrine.orm.default_metadata_cache' => 'getDoctrineCache_Providers_Doctrine_Orm_DefaultMetadataCacheService',
            'doctrine_cache.providers.doctrine.orm.default_query_cache' => 'getDoctrineCache_Providers_Doctrine_Orm_DefaultQueryCacheService',
            'doctrine_cache.providers.doctrine.orm.default_result_cache' => 'getDoctrineCache_Providers_Doctrine_Orm_DefaultResultCacheService',
            'easyadmin.config.manager' => 'getEasyadmin_Config_ManagerService',
            'easyadmin.filter.registry' => 'getEasyadmin_Filter_RegistryService',
            'easyadmin.listener.controller' => 'getEasyadmin_Listener_ControllerService',
            'easyadmin.property_accessor' => 'getEasyadmin_PropertyAccessorService',
            'easyadmin.router' => 'getEasyadmin_RouterService',
            'easyadmin.security.authorization_checker' => 'getEasyadmin_Security_AuthorizationCheckerService',
            'event_dispatcher' => 'getEventDispatcherService',
            'filesystem' => 'getFilesystemService',
            'http_kernel' => 'getHttpKernelService',
            'liip_imagine.cache.manager' => 'getLiipImagine_Cache_ManagerService',
            'liip_imagine.cache.resolver.default' => 'getLiipImagine_Cache_Resolver_DefaultService',
            'liip_imagine.cache.resolver.no_cache_web_path' => 'getLiipImagine_Cache_Resolver_NoCacheWebPathService',
            'liip_imagine.cache.signer' => 'getLiipImagine_Cache_SignerService',
            'profiler' => 'getProfilerService',
            'request_stack' => 'getRequestStackService',
            'router' => 'getRouterService',
            'security.authorization_checker' => 'getSecurity_AuthorizationCheckerService',
            'security.token_storage' => 'getSecurity_TokenStorageService',
            'translator' => 'getTranslatorService',
            'twig' => 'getTwigService',
            'validator' => 'getValidatorService',
            'var_dumper.cloner' => 'getVarDumper_ClonerService',
        ];
        $this->fileMap = [
            'App\\Controller\\AdminController' => 'getAdminControllerService.php',
            'App\\Controller\\HomeController' => 'getHomeControllerService.php',
            'App\\Controller\\LunettesController' => 'getLunettesControllerService.php',
            'App\\Controller\\SecurityController' => 'getSecurityControllerService.php',
            'EasyCorp\\Bundle\\EasyAdminBundle\\Controller\\EasyAdminController' => 'getEasyAdminControllerService.php',
            'Liip\\ImagineBundle\\Controller\\ImagineController' => 'getImagineControllerService.php',
            'Symfony\\Bundle\\FrameworkBundle\\Controller\\RedirectController' => 'getRedirectControllerService.php',
            'Symfony\\Bundle\\FrameworkBundle\\Controller\\TemplateController' => 'getTemplateControllerService.php',
            'cache.app_clearer' => 'getCache_AppClearerService.php',
            'cache.global_clearer' => 'getCache_GlobalClearerService.php',
            'cache.system_clearer' => 'getCache_SystemClearerService.php',
            'cache_clearer' => 'getCacheClearerService.php',
            'cache_warmer' => 'getCacheWarmerService.php',
            'console.command.public_alias.doctrine_cache.contains_command' => 'getConsole_Command_PublicAlias_DoctrineCache_ContainsCommandService.php',
            'console.command.public_alias.doctrine_cache.delete_command' => 'getConsole_Command_PublicAlias_DoctrineCache_DeleteCommandService.php',
            'console.command.public_alias.doctrine_cache.flush_command' => 'getConsole_Command_PublicAlias_DoctrineCache_FlushCommandService.php',
            'console.command.public_alias.doctrine_cache.stats_command' => 'getConsole_Command_PublicAlias_DoctrineCache_StatsCommandService.php',
            'console.command.public_alias.doctrine_migrations.diff_command' => 'getConsole_Command_PublicAlias_DoctrineMigrations_DiffCommandService.php',
            'console.command.public_alias.doctrine_migrations.dump_schema_command' => 'getConsole_Command_PublicAlias_DoctrineMigrations_DumpSchemaCommandService.php',
            'console.command.public_alias.doctrine_migrations.execute_command' => 'getConsole_Command_PublicAlias_DoctrineMigrations_ExecuteCommandService.php',
            'console.command.public_alias.doctrine_migrations.generate_command' => 'getConsole_Command_PublicAlias_DoctrineMigrations_GenerateCommandService.php',
            'console.command.public_alias.doctrine_migrations.latest_command' => 'getConsole_Command_PublicAlias_DoctrineMigrations_LatestCommandService.php',
            'console.command.public_alias.doctrine_migrations.migrate_command' => 'getConsole_Command_PublicAlias_DoctrineMigrations_MigrateCommandService.php',
            'console.command.public_alias.doctrine_migrations.rollup_command' => 'getConsole_Command_PublicAlias_DoctrineMigrations_RollupCommandService.php',
            'console.command.public_alias.doctrine_migrations.status_command' => 'getConsole_Command_PublicAlias_DoctrineMigrations_StatusCommandService.php',
            'console.command.public_alias.doctrine_migrations.up_to_date_command' => 'getConsole_Command_PublicAlias_DoctrineMigrations_UpToDateCommandService.php',
            'console.command.public_alias.doctrine_migrations.version_command' => 'getConsole_Command_PublicAlias_DoctrineMigrations_VersionCommandService.php',
            'console.command_loader' => 'getConsole_CommandLoaderService.php',
            'easyadmin.autocomplete' => 'getEasyadmin_AutocompleteService.php',
            'easyadmin.form.guesser.missing_doctrine_orm_type_guesser' => 'getEasyadmin_Form_Guesser_MissingDoctrineOrmTypeGuesserService.php',
            'easyadmin.listener.request_post_initialize' => 'getEasyadmin_Listener_RequestPostInitializeService.php',
            'easyadmin.paginator' => 'getEasyadmin_PaginatorService.php',
            'easyadmin.query_builder' => 'getEasyadmin_QueryBuilderService.php',
            'form.factory' => 'getForm_FactoryService.php',
            'form.type.file' => 'getForm_Type_FileService.php',
            'knp_paginator' => 'getKnpPaginatorService.php',
            'liip_imagine.binary.loader.default' => 'getLiipImagine_Binary_Loader_DefaultService.php',
            'liip_imagine.config.stack_collection' => 'getLiipImagine_Config_StackCollectionService.php',
            'liip_imagine.data.manager' => 'getLiipImagine_Data_ManagerService.php',
            'liip_imagine.filter.loader.downscale' => 'getLiipImagine_Filter_Loader_DownscaleService.php',
            'liip_imagine.filter.loader.flip' => 'getLiipImagine_Filter_Loader_FlipService.php',
            'liip_imagine.filter.loader.grayscale' => 'getLiipImagine_Filter_Loader_GrayscaleService.php',
            'liip_imagine.filter.loader.interlace' => 'getLiipImagine_Filter_Loader_InterlaceService.php',
            'liip_imagine.filter.loader.resample' => 'getLiipImagine_Filter_Loader_ResampleService.php',
            'liip_imagine.filter.loader.rotate' => 'getLiipImagine_Filter_Loader_RotateService.php',
            'liip_imagine.filter.manager' => 'getLiipImagine_Filter_ManagerService.php',
            'routing.loader' => 'getRouting_LoaderService.php',
            'security.authentication_utils' => 'getSecurity_AuthenticationUtilsService.php',
            'security.csrf.token_manager' => 'getSecurity_Csrf_TokenManagerService.php',
            'security.password_encoder' => 'getSecurity_PasswordEncoderService.php',
            'serializer' => 'getSerializerService.php',
            'services_resetter' => 'getServicesResetterService.php',
            'session' => 'getSessionService.php',
            'swiftmailer.mailer.default' => 'getSwiftmailer_Mailer_DefaultService.php',
            'swiftmailer.mailer.default.plugin.messagelogger' => 'getSwiftmailer_Mailer_Default_Plugin_MessageloggerService.php',
            'swiftmailer.mailer.default.transport.real' => 'getSwiftmailer_Mailer_Default_Transport_RealService.php',
            'swiftmailer.transport' => 'getSwiftmailer_TransportService.php',
            'twig.controller.exception' => 'getTwig_Controller_ExceptionService.php',
            'twig.controller.preview_error' => 'getTwig_Controller_PreviewErrorService.php',
            'web_profiler.controller.exception' => 'getWebProfiler_Controller_ExceptionService.php',
            'web_profiler.controller.profiler' => 'getWebProfiler_Controller_ProfilerService.php',
            'web_profiler.controller.router' => 'getWebProfiler_Controller_RouterService.php',
        ];
        $this->aliases = [
            'EasyCorp\\Bundle\\EasyAdminBundle\\Form\\Filter\\FilterRegistry' => 'easyadmin.filter.registry',
            'database_connection' => 'doctrine.dbal.default_connection',
            'doctrine.orm.default_metadata_cache' => 'doctrine_cache.providers.doctrine.orm.default_metadata_cache',
            'doctrine.orm.default_query_cache' => 'doctrine_cache.providers.doctrine.orm.default_query_cache',
            'doctrine.orm.default_result_cache' => 'doctrine_cache.providers.doctrine.orm.default_result_cache',
            'doctrine.orm.entity_manager' => 'doctrine.orm.default_entity_manager',
            'liip_imagine.controller' => 'Liip\\ImagineBundle\\Controller\\ImagineController',
            'mailer' => 'swiftmailer.mailer.default',
        ];

        $this->privates['service_container'] = function () {
            include_once $this->targetDirs[3].'\\vendor\\symfony\\framework-bundle\\Controller\\ControllerNameParser.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\http-kernel\\ControllerMetadata\\ArgumentMetadataFactoryInterface.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\http-kernel\\ControllerMetadata\\ArgumentMetadataFactory.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\event-dispatcher\\EventSubscriberInterface.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\http-kernel\\EventListener\\ResponseListener.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\http-kernel\\EventListener\\StreamedResponseListener.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\http-kernel\\EventListener\\LocaleListener.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\http-kernel\\EventListener\\ValidateRequestListener.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\framework-bundle\\EventListener\\ResolveControllerNameSubscriber.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\http-kernel\\EventListener\\DisallowRobotsIndexingListener.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\dependency-injection\\ParameterBag\\ParameterBagInterface.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\dependency-injection\\ParameterBag\\ParameterBag.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\dependency-injection\\ParameterBag\\FrozenParameterBag.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\dependency-injection\\ParameterBag\\ContainerBagInterface.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\dependency-injection\\ParameterBag\\ContainerBag.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\http-kernel\\HttpKernelInterface.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\http-kernel\\TerminableInterface.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\http-kernel\\HttpKernel.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\http-kernel\\Controller\\ArgumentResolverInterface.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\http-kernel\\Controller\\TraceableArgumentResolver.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\http-kernel\\Controller\\ArgumentResolver.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\http-foundation\\RequestStack.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\filesystem\\Filesystem.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\config\\ConfigCacheFactoryInterface.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\config\\ResourceCheckerConfigCacheFactory.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\http-kernel\\EventListener\\LocaleAwareListener.php';
            include_once $this->targetDirs[3].'\\vendor\\psr\\cache\\src\\CacheItemPoolInterface.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\cache\\Adapter\\AdapterInterface.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\cache-contracts\\CacheInterface.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\cache\\PruneableInterface.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\cache\\ResettableInterface.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\cache\\Adapter\\TraceableAdapter.php';
            include_once $this->targetDirs[3].'\\vendor\\psr\\log\\Psr\\Log\\LoggerAwareInterface.php';
            include_once $this->targetDirs[3].'\\vendor\\psr\\log\\Psr\\Log\\LoggerAwareTrait.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\cache\\Traits\\AbstractTrait.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\cache\\Traits\\AbstractAdapterTrait.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\cache-contracts\\CacheTrait.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\cache\\Traits\\ContractsTrait.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\cache\\Adapter\\AbstractAdapter.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\cache\\Traits\\FilesystemCommonTrait.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\cache\\Traits\\FilesystemTrait.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\cache\\Adapter\\FilesystemAdapter.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\cache\\Marshaller\\MarshallerInterface.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\cache\\Marshaller\\DefaultMarshaller.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\http-kernel\\EventListener\\AbstractSessionListener.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\http-kernel\\EventListener\\SessionListener.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\service-contracts\\ServiceProviderInterface.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\service-contracts\\ServiceLocatorTrait.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\dependency-injection\\ServiceLocator.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\form\\FormRegistryInterface.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\form\\FormRegistry.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\form\\FormExtensionInterface.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\form\\Extension\\DependencyInjection\\DependencyInjectionExtension.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\form\\ResolvedFormTypeFactoryInterface.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\form\\Extension\\DataCollector\\Proxy\\ResolvedTypeFactoryDataCollectorProxy.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\form\\ResolvedFormTypeFactory.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\validator\\Validation.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\validator\\ConstraintValidatorFactoryInterface.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\validator\\ContainerConstraintValidatorFactory.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\translation-contracts\\LocaleAwareInterface.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\translation\\TranslatorInterface.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\translation-contracts\\TranslatorInterface.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\validator\\Util\\LegacyTranslatorProxy.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\validator\\ObjectInitializerInterface.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\doctrine-bridge\\Validator\\DoctrineInitializer.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\validator\\Mapping\\Loader\\LoaderInterface.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\doctrine-bridge\\Validator\\DoctrineLoader.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\translation\\TranslatorBagInterface.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\translation\\Translator.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\http-kernel\\CacheWarmer\\WarmableInterface.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\framework-bundle\\Translation\\Translator.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\translation\\Formatter\\MessageFormatterInterface.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\translation\\Formatter\\IntlFormatterInterface.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\translation\\Formatter\\ChoiceMessageFormatterInterface.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\translation\\Formatter\\MessageFormatter.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\translation-contracts\\TranslatorTrait.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\translation\\IdentityTranslator.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\http-kernel\\Profiler\\Profiler.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\http-kernel\\Profiler\\ProfilerStorageInterface.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\http-kernel\\Profiler\\FileProfilerStorage.php';
            include_once $this->targetDirs[3].'\\vendor\\psr\\log\\Psr\\Log\\LoggerInterface.php';
            include_once $this->targetDirs[3].'\\vendor\\monolog\\monolog\\src\\Monolog\\ResettableInterface.php';
            include_once $this->targetDirs[3].'\\vendor\\monolog\\monolog\\src\\Monolog\\Logger.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\http-kernel\\Log\\DebugLoggerInterface.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\monolog-bridge\\Logger.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\http-kernel\\DataCollector\\DataCollectorInterface.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\http-kernel\\DataCollector\\DataCollector.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\http-kernel\\DataCollector\\LateDataCollectorInterface.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\http-kernel\\DataCollector\\TimeDataCollector.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\http-kernel\\DataCollector\\MemoryDataCollector.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\validator\\DataCollector\\ValidatorDataCollector.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\http-kernel\\DataCollector\\AjaxDataCollector.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\http-kernel\\DataCollector\\ExceptionDataCollector.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\http-kernel\\DataCollector\\LoggerDataCollector.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\http-kernel\\DataCollector\\EventDataCollector.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\cache\\DataCollector\\CacheDataCollector.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\translation\\DataCollector\\TranslationDataCollector.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\security-bundle\\DataCollector\\SecurityDataCollector.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\twig-bridge\\DataCollector\\TwigDataCollector.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\doctrine-bridge\\DataCollector\\DoctrineDataCollector.php';
            include_once $this->targetDirs[3].'\\vendor\\doctrine\\doctrine-bundle\\DataCollector\\DoctrineDataCollector.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\swiftmailer-bundle\\DataCollector\\MessageDataCollector.php';
            include_once $this->targetDirs[3].'\\vendor\\easycorp\\easyadmin-bundle\\src\\DataCollector\\EasyAdminDataCollector.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\http-kernel\\DataCollector\\ConfigDataCollector.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\http-kernel\\EventListener\\ProfilerListener.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\http-kernel\\DataCollector\\RequestDataCollector.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\http-kernel\\DataCollector\\RouterDataCollector.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\framework-bundle\\DataCollector\\RouterDataCollector.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\form\\Extension\\DataCollector\\FormDataCollectorInterface.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\form\\Extension\\DataCollector\\FormDataCollector.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\form\\Extension\\DataCollector\\FormDataExtractorInterface.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\form\\Extension\\DataCollector\\FormDataExtractor.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\http-kernel\\EventListener\\DebugHandlersListener.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\http-kernel\\Debug\\FileLinkFormatter.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\stopwatch\\Stopwatch.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\http-kernel\\Controller\\ControllerResolverInterface.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\http-kernel\\Controller\\TraceableControllerResolver.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\http-kernel\\Controller\\ControllerResolver.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\http-kernel\\Controller\\ContainerControllerResolver.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\framework-bundle\\Controller\\ControllerResolver.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\monolog-bridge\\Processor\\DebugProcessor.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\routing\\RequestContext.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\http-kernel\\EventListener\\RouterListener.php';
            include_once $this->targetDirs[3].'\\vendor\\doctrine\\annotations\\lib\\Doctrine\\Common\\Annotations\\Reader.php';
            include_once $this->targetDirs[3].'\\vendor\\doctrine\\annotations\\lib\\Doctrine\\Common\\Annotations\\AnnotationReader.php';
            include_once $this->targetDirs[3].'\\vendor\\doctrine\\annotations\\lib\\Doctrine\\Common\\Annotations\\AnnotationRegistry.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\web-link\\EventListener\\AddLinkHeaderListener.php';
            include_once $this->targetDirs[3].'\\vendor\\sensio\\framework-extra-bundle\\EventListener\\ControllerListener.php';
            include_once $this->targetDirs[3].'\\vendor\\sensio\\framework-extra-bundle\\EventListener\\ParamConverterListener.php';
            include_once $this->targetDirs[3].'\\vendor\\sensio\\framework-extra-bundle\\Request\\ParamConverter\\ParamConverterManager.php';
            include_once $this->targetDirs[3].'\\vendor\\sensio\\framework-extra-bundle\\Request\\ParamConverter\\ParamConverterInterface.php';
            include_once $this->targetDirs[3].'\\vendor\\sensio\\framework-extra-bundle\\Request\\ParamConverter\\DoctrineParamConverter.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\expression-language\\ExpressionLanguage.php';
            include_once $this->targetDirs[3].'\\vendor\\sensio\\framework-extra-bundle\\Request\\ParamConverter\\DateTimeParamConverter.php';
            include_once $this->targetDirs[3].'\\vendor\\sensio\\framework-extra-bundle\\EventListener\\TemplateListener.php';
            include_once $this->targetDirs[3].'\\vendor\\sensio\\framework-extra-bundle\\Templating\\TemplateGuesser.php';
            include_once $this->targetDirs[3].'\\vendor\\sensio\\framework-extra-bundle\\EventListener\\HttpCacheListener.php';
            include_once $this->targetDirs[3].'\\vendor\\sensio\\framework-extra-bundle\\EventListener\\SecurityListener.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\security-core\\Authorization\\ExpressionLanguage.php';
            include_once $this->targetDirs[3].'\\vendor\\sensio\\framework-extra-bundle\\Security\\ExpressionLanguage.php';
            include_once $this->targetDirs[3].'\\vendor\\sensio\\framework-extra-bundle\\EventListener\\IsGrantedListener.php';
            include_once $this->targetDirs[3].'\\vendor\\sensio\\framework-extra-bundle\\Request\\ArgumentNameConverter.php';
            include_once $this->targetDirs[3].'\\vendor\\doctrine\\persistence\\lib\\Doctrine\\Common\\Persistence\\ConnectionRegistry.php';
            include_once $this->targetDirs[3].'\\vendor\\doctrine\\persistence\\lib\\Doctrine\\Common\\Persistence\\ManagerRegistry.php';
            include_once $this->targetDirs[3].'\\vendor\\doctrine\\persistence\\lib\\Doctrine\\Common\\Persistence\\AbstractManagerRegistry.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\doctrine-bridge\\ManagerRegistry.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\doctrine-bridge\\RegistryInterface.php';
            include_once $this->targetDirs[3].'\\vendor\\doctrine\\doctrine-bundle\\Registry.php';
            include_once $this->targetDirs[3].'\\vendor\\doctrine\\dbal\\lib\\Doctrine\\DBAL\\Logging\\SQLLogger.php';
            include_once $this->targetDirs[3].'\\vendor\\doctrine\\dbal\\lib\\Doctrine\\DBAL\\Logging\\DebugStack.php';
            include_once $this->targetDirs[3].'\\vendor\\doctrine\\dbal\\lib\\Doctrine\\DBAL\\Driver\\Connection.php';
            include_once $this->targetDirs[3].'\\vendor\\doctrine\\dbal\\lib\\Doctrine\\DBAL\\Connection.php';
            include_once $this->targetDirs[3].'\\vendor\\doctrine\\dbal\\lib\\Doctrine\\DBAL\\Configuration.php';
            include_once $this->targetDirs[3].'\\vendor\\doctrine\\dbal\\lib\\Doctrine\\DBAL\\Logging\\LoggerChain.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\doctrine-bridge\\Logger\\DbalLogger.php';
            include_once $this->targetDirs[3].'\\vendor\\doctrine\\event-manager\\lib\\Doctrine\\Common\\EventManager.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\doctrine-bridge\\ContainerAwareEventManager.php';
            include_once $this->targetDirs[3].'\\vendor\\doctrine\\doctrine-bundle\\ConnectionFactory.php';
            include_once $this->targetDirs[3].'\\vendor\\doctrine\\cache\\lib\\Doctrine\\Common\\Cache\\Cache.php';
            include_once $this->targetDirs[3].'\\vendor\\doctrine\\cache\\lib\\Doctrine\\Common\\Cache\\FlushableCache.php';
            include_once $this->targetDirs[3].'\\vendor\\doctrine\\cache\\lib\\Doctrine\\Common\\Cache\\ClearableCache.php';
            include_once $this->targetDirs[3].'\\vendor\\doctrine\\cache\\lib\\Doctrine\\Common\\Cache\\MultiGetCache.php';
            include_once $this->targetDirs[3].'\\vendor\\doctrine\\cache\\lib\\Doctrine\\Common\\Cache\\MultiDeleteCache.php';
            include_once $this->targetDirs[3].'\\vendor\\doctrine\\cache\\lib\\Doctrine\\Common\\Cache\\MultiPutCache.php';
            include_once $this->targetDirs[3].'\\vendor\\doctrine\\cache\\lib\\Doctrine\\Common\\Cache\\MultiOperationCache.php';
            include_once $this->targetDirs[3].'\\vendor\\doctrine\\cache\\lib\\Doctrine\\Common\\Cache\\CacheProvider.php';
            include_once $this->targetDirs[3].'\\vendor\\doctrine\\cache\\lib\\Doctrine\\Common\\Cache\\ArrayCache.php';
            include_once $this->targetDirs[3].'\\vendor\\doctrine\\persistence\\lib\\Doctrine\\Common\\Persistence\\ObjectManager.php';
            include_once $this->targetDirs[3].'\\vendor\\doctrine\\orm\\lib\\Doctrine\\ORM\\EntityManagerInterface.php';
            include_once $this->targetDirs[3].'\\vendor\\doctrine\\orm\\lib\\Doctrine\\ORM\\EntityManager.php';
            include_once $this->targetDirs[3].'\\vendor\\doctrine\\orm\\lib\\Doctrine\\ORM\\Configuration.php';
            include_once $this->targetDirs[3].'\\vendor\\doctrine\\persistence\\lib\\Doctrine\\Common\\Persistence\\Mapping\\Driver\\MappingDriver.php';
            include_once $this->targetDirs[3].'\\vendor\\doctrine\\persistence\\lib\\Doctrine\\Common\\Persistence\\Mapping\\Driver\\MappingDriverChain.php';
            include_once $this->targetDirs[3].'\\vendor\\doctrine\\persistence\\lib\\Doctrine\\Common\\Persistence\\Mapping\\Driver\\AnnotationDriver.php';
            include_once $this->targetDirs[3].'\\vendor\\doctrine\\orm\\lib\\Doctrine\\ORM\\Mapping\\Driver\\AnnotationDriver.php';
            include_once $this->targetDirs[3].'\\vendor\\doctrine\\orm\\lib\\Doctrine\\ORM\\Mapping\\NamingStrategy.php';
            include_once $this->targetDirs[3].'\\vendor\\doctrine\\orm\\lib\\Doctrine\\ORM\\Mapping\\UnderscoreNamingStrategy.php';
            include_once $this->targetDirs[3].'\\vendor\\doctrine\\orm\\lib\\Doctrine\\ORM\\Mapping\\QuoteStrategy.php';
            include_once $this->targetDirs[3].'\\vendor\\doctrine\\orm\\lib\\Doctrine\\ORM\\Mapping\\DefaultQuoteStrategy.php';
            include_once $this->targetDirs[3].'\\vendor\\doctrine\\orm\\lib\\Doctrine\\ORM\\Mapping\\EntityListenerResolver.php';
            include_once $this->targetDirs[3].'\\vendor\\doctrine\\doctrine-bundle\\Mapping\\EntityListenerServiceResolver.php';
            include_once $this->targetDirs[3].'\\vendor\\doctrine\\doctrine-bundle\\Mapping\\ContainerEntityListenerResolver.php';
            include_once $this->targetDirs[3].'\\vendor\\doctrine\\orm\\lib\\Doctrine\\ORM\\Repository\\RepositoryFactory.php';
            include_once $this->targetDirs[3].'\\vendor\\doctrine\\doctrine-bundle\\Repository\\ContainerRepositoryFactory.php';
            include_once $this->targetDirs[3].'\\vendor\\doctrine\\doctrine-bundle\\ManagerConfigurator.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\security-core\\Authorization\\AuthorizationCheckerInterface.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\security-core\\Authorization\\AuthorizationChecker.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\security-core\\Authentication\\Token\\Storage\\TokenStorageInterface.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\security-core\\Authentication\\Token\\Storage\\TokenStorage.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\security-core\\Authentication\\AuthenticationManagerInterface.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\security-core\\Authentication\\AuthenticationProviderManager.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\security-core\\Authentication\\AuthenticationTrustResolverInterface.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\security-core\\Authentication\\AuthenticationTrustResolver.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\security-core\\Role\\RoleHierarchyInterface.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\security-core\\Role\\RoleHierarchy.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\security-http\\FirewallMapInterface.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\security-bundle\\Security\\FirewallMap.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\security-http\\Logout\\LogoutUrlGenerator.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\security-http\\RememberMe\\ResponseListener.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\security-core\\Authorization\\AccessDecisionManagerInterface.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\security-core\\Authorization\\TraceableAccessDecisionManager.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\security-core\\Authorization\\AccessDecisionManager.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\security-http\\Firewall.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\security-bundle\\EventListener\\FirewallListener.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\security-bundle\\Debug\\TraceableFirewallListener.php';
            include_once $this->targetDirs[3].'\\vendor\\twig\\twig\\src\\Environment.php';
            include_once $this->targetDirs[3].'\\vendor\\twig\\twig\\src\\Extension\\ExtensionInterface.php';
            include_once $this->targetDirs[3].'\\vendor\\twig\\twig\\src\\Extension\\AbstractExtension.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\twig-bridge\\Extension\\CsrfExtension.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\twig-bridge\\Extension\\LogoutUrlExtension.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\twig-bridge\\Extension\\SecurityExtension.php';
            include_once $this->targetDirs[3].'\\vendor\\twig\\twig\\src\\Extension\\ProfilerExtension.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\twig-bridge\\Extension\\ProfilerExtension.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\twig-bridge\\Extension\\TranslationExtension.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\twig-bridge\\Extension\\AssetExtension.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\asset\\Packages.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\asset\\PackageInterface.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\asset\\Package.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\asset\\PathPackage.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\asset\\VersionStrategy\\VersionStrategyInterface.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\asset\\VersionStrategy\\EmptyVersionStrategy.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\asset\\Context\\ContextInterface.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\asset\\Context\\RequestStackContext.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\twig-bridge\\Extension\\CodeExtension.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\twig-bridge\\Extension\\RoutingExtension.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\twig-bridge\\Extension\\YamlExtension.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\twig-bridge\\Extension\\StopwatchExtension.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\twig-bridge\\Extension\\ExpressionExtension.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\twig-bridge\\Extension\\HttpKernelExtension.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\twig-bridge\\Extension\\HttpFoundationExtension.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\http-foundation\\UrlHelper.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\twig-bridge\\Extension\\WebLinkExtension.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\twig-bridge\\Extension\\FormExtension.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\twig-bridge\\Extension\\DumpExtension.php';
            include_once $this->targetDirs[3].'\\vendor\\doctrine\\doctrine-bundle\\Twig\\DoctrineExtension.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\web-profiler-bundle\\Twig\\WebProfilerExtension.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\var-dumper\\Dumper\\DataDumperInterface.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\var-dumper\\Cloner\\DumperInterface.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\var-dumper\\Dumper\\AbstractDumper.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\var-dumper\\Dumper\\CliDumper.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\var-dumper\\Dumper\\HtmlDumper.php';
            include_once $this->targetDirs[3].'\\vendor\\easycorp\\easyadmin-bundle\\src\\Twig\\EasyAdminTwigExtension.php';
            include_once $this->targetDirs[3].'\\vendor\\liip\\imagine-bundle\\Templating\\FilterTrait.php';
            include_once $this->targetDirs[3].'\\vendor\\liip\\imagine-bundle\\Templating\\FilterExtension.php';
            include_once $this->targetDirs[3].'\\vendor\\knplabs\\knp-paginator-bundle\\Twig\\Extension\\PaginationExtension.php';
            include_once $this->targetDirs[3].'\\vendor\\knplabs\\knp-paginator-bundle\\Helper\\Processor.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\twig-bridge\\AppVariable.php';
            include_once $this->targetDirs[3].'\\vendor\\twig\\twig\\src\\RuntimeLoader\\RuntimeLoaderInterface.php';
            include_once $this->targetDirs[3].'\\vendor\\twig\\twig\\src\\RuntimeLoader\\ContainerRuntimeLoader.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\twig-bundle\\DependencyInjection\\Configurator\\EnvironmentConfigurator.php';
            include_once $this->targetDirs[3].'\\vendor\\twig\\twig\\src\\Loader\\LoaderInterface.php';
            include_once $this->targetDirs[3].'\\vendor\\twig\\twig\\src\\Loader\\ExistsLoaderInterface.php';
            include_once $this->targetDirs[3].'\\vendor\\twig\\twig\\src\\Loader\\SourceContextLoaderInterface.php';
            include_once $this->targetDirs[3].'\\vendor\\twig\\twig\\src\\Loader\\FilesystemLoader.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\twig-bundle\\Loader\\NativeFilesystemLoader.php';
            include_once $this->targetDirs[3].'\\vendor\\twig\\twig\\src\\Profiler\\Profile.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\web-profiler-bundle\\Csp\\ContentSecurityPolicyHandler.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\web-profiler-bundle\\Csp\\NonceGenerator.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\web-profiler-bundle\\EventListener\\WebDebugToolbarListener.php';
            include_once $this->targetDirs[3].'\\vendor\\monolog\\monolog\\src\\Monolog\\Handler\\HandlerInterface.php';
            include_once $this->targetDirs[3].'\\vendor\\monolog\\monolog\\src\\Monolog\\Handler\\AbstractHandler.php';
            include_once $this->targetDirs[3].'\\vendor\\monolog\\monolog\\src\\Monolog\\Handler\\AbstractProcessingHandler.php';
            include_once $this->targetDirs[3].'\\vendor\\monolog\\monolog\\src\\Monolog\\Handler\\StreamHandler.php';
            include_once $this->targetDirs[3].'\\vendor\\monolog\\monolog\\src\\Monolog\\Processor\\ProcessorInterface.php';
            include_once $this->targetDirs[3].'\\vendor\\monolog\\monolog\\src\\Monolog\\Processor\\PsrLogMessageProcessor.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\monolog-bridge\\Handler\\ConsoleHandler.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\http-kernel\\DataCollector\\DumpDataCollector.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\var-dumper\\Cloner\\ClonerInterface.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\var-dumper\\Cloner\\AbstractCloner.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\var-dumper\\Cloner\\VarCloner.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\var-dumper\\Server\\Connection.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\var-dumper\\Dumper\\ContextProvider\\ContextProviderInterface.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\var-dumper\\Dumper\\ContextProvider\\SourceContextProvider.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\var-dumper\\Dumper\\ContextProvider\\RequestContextProvider.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\var-dumper\\Dumper\\ContextProvider\\CliContextProvider.php';
            include_once $this->targetDirs[3].'\\vendor\\easycorp\\easyadmin-bundle\\src\\Configuration\\ConfigManager.php';
            include_once $this->targetDirs[3].'\\vendor\\easycorp\\easyadmin-bundle\\src\\Configuration\\ConfigPassInterface.php';
            include_once $this->targetDirs[3].'\\vendor\\easycorp\\easyadmin-bundle\\src\\Configuration\\NormalizerConfigPass.php';
            include_once $this->targetDirs[3].'\\vendor\\easycorp\\easyadmin-bundle\\src\\Configuration\\DesignConfigPass.php';
            include_once $this->targetDirs[3].'\\vendor\\easycorp\\easyadmin-bundle\\src\\Configuration\\MenuConfigPass.php';
            include_once $this->targetDirs[3].'\\vendor\\easycorp\\easyadmin-bundle\\src\\Configuration\\ActionConfigPass.php';
            include_once $this->targetDirs[3].'\\vendor\\easycorp\\easyadmin-bundle\\src\\Configuration\\MetadataConfigPass.php';
            include_once $this->targetDirs[3].'\\vendor\\easycorp\\easyadmin-bundle\\src\\Configuration\\PropertyConfigPass.php';
            include_once $this->targetDirs[3].'\\vendor\\easycorp\\easyadmin-bundle\\src\\Configuration\\ViewConfigPass.php';
            include_once $this->targetDirs[3].'\\vendor\\easycorp\\easyadmin-bundle\\src\\Configuration\\TemplateConfigPass.php';
            include_once $this->targetDirs[3].'\\vendor\\easycorp\\easyadmin-bundle\\src\\Configuration\\DefaultConfigPass.php';
            include_once $this->targetDirs[3].'\\vendor\\easycorp\\easyadmin-bundle\\src\\Router\\EasyAdminRouter.php';
            include_once $this->targetDirs[3].'\\vendor\\easycorp\\easyadmin-bundle\\src\\Security\\AuthorizationChecker.php';
            include_once $this->targetDirs[3].'\\vendor\\easycorp\\easyadmin-bundle\\src\\EventListener\\ControllerListener.php';
            include_once $this->targetDirs[3].'\\vendor\\easycorp\\easyadmin-bundle\\src\\Form\\Filter\\FilterRegistry.php';
            include_once $this->targetDirs[3].'\\vendor\\liip\\imagine-bundle\\Imagine\\Cache\\Resolver\\ResolverInterface.php';
            include_once $this->targetDirs[3].'\\vendor\\liip\\imagine-bundle\\Imagine\\Cache\\Resolver\\WebPathResolver.php';
            include_once $this->targetDirs[3].'\\vendor\\liip\\imagine-bundle\\Imagine\\Cache\\CacheManager.php';
            include_once $this->targetDirs[3].'\\vendor\\liip\\imagine-bundle\\Imagine\\Filter\\FilterConfiguration.php';
            include_once $this->targetDirs[3].'\\vendor\\liip\\imagine-bundle\\Imagine\\Cache\\Resolver\\NoCacheWebPathResolver.php';
            include_once $this->targetDirs[3].'\\vendor\\liip\\imagine-bundle\\Imagine\\Cache\\SignerInterface.php';
            include_once $this->targetDirs[3].'\\vendor\\liip\\imagine-bundle\\Imagine\\Cache\\Signer.php';
            include_once $this->targetDirs[3].'\\vendor\\knplabs\\knp-paginator-bundle\\Subscriber\\SlidingPaginationSubscriber.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\translation\\DataCollectorTranslator.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\routing\\RequestContextAwareInterface.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\routing\\Matcher\\UrlMatcherInterface.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\routing\\Generator\\UrlGeneratorInterface.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\routing\\RouterInterface.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\routing\\Matcher\\RequestMatcherInterface.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\routing\\Router.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\service-contracts\\ServiceSubscriberInterface.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\dependency-injection\\ServiceSubscriberInterface.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\framework-bundle\\Routing\\Router.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\property-access\\PropertyAccessorInterface.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\property-access\\PropertyAccessor.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\cache\\Traits\\ArrayTrait.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\cache\\Adapter\\ArrayAdapter.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\validator\\Mapping\\Factory\\MetadataFactoryInterface.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\validator\\Validator\\ValidatorInterface.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\validator\\Validator\\TraceableValidator.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\event-dispatcher-contracts\\EventDispatcherInterface.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\event-dispatcher\\EventDispatcherInterface.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\event-dispatcher\\Debug\\TraceableEventDispatcherInterface.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\event-dispatcher\\Debug\\TraceableEventDispatcher.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\http-kernel\\Debug\\TraceableEventDispatcher.php';
            include_once $this->targetDirs[3].'\\vendor\\symfony\\event-dispatcher\\EventDispatcher.php';
            include_once $this->targetDirs[3].'\\vendor\\monolog\\monolog\\src\\Monolog\\Handler\\NullHandler.php';
            include_once $this->targetDirs[3].'\\vendor\\doctrine\\annotations\\lib\\Doctrine\\Common\\Annotations\\CachedReader.php';
        };
    }

    public function compile()
    {
        throw new LogicException('You cannot compile a dumped container that was already compiled.');
    }

    public function isCompiled()
    {
        return true;
    }

    public function getRemovedIds()
    {
        return require $this->containerDir.\DIRECTORY_SEPARATOR.'removed-ids.php';
    }

    protected function load($file, $lazyLoad = true)
    {
        return require $this->containerDir.\DIRECTORY_SEPARATOR.$file;
    }

    /**
     * Gets the public 'cache.app' shared service.
     *
     * @return \Symfony\Component\Cache\Adapter\TraceableAdapter
     */
    protected function getCache_AppService()
    {
        $a = new \Symfony\Component\Cache\Adapter\FilesystemAdapter('eC4T3WdE06', 0, ($this->targetDirs[0].'/pools'), ($this->privates['cache.default_marshaller'] ?? ($this->privates['cache.default_marshaller'] = new \Symfony\Component\Cache\Marshaller\DefaultMarshaller(NULL))));
        $a->setLogger(($this->privates['monolog.logger.cache'] ?? $this->getMonolog_Logger_CacheService()));

        return $this->services['cache.app'] = new \Symfony\Component\Cache\Adapter\TraceableAdapter($a);
    }

    /**
     * Gets the public 'cache.system' shared service.
     *
     * @return \Symfony\Component\Cache\Adapter\TraceableAdapter
     */
    protected function getCache_SystemService()
    {
        return $this->services['cache.system'] = new \Symfony\Component\Cache\Adapter\TraceableAdapter(\Symfony\Component\Cache\Adapter\AbstractAdapter::createSystemCache('LoWd2B2u8l', 0, $this->getParameter('container.build_id'), ($this->targetDirs[0].'/pools'), ($this->privates['monolog.logger.cache'] ?? $this->getMonolog_Logger_CacheService())));
    }

    /**
     * Gets the public 'data_collector.dump' shared service.
     *
     * @return \Symfony\Component\HttpKernel\DataCollector\DumpDataCollector
     */
    protected function getDataCollector_DumpService()
    {
        return $this->services['data_collector.dump'] = new \Symfony\Component\HttpKernel\DataCollector\DumpDataCollector(($this->privates['debug.stopwatch'] ?? ($this->privates['debug.stopwatch'] = new \Symfony\Component\Stopwatch\Stopwatch(true))), ($this->privates['debug.file_link_formatter'] ?? $this->getDebug_FileLinkFormatterService()), 'UTF-8', ($this->services['request_stack'] ?? ($this->services['request_stack'] = new \Symfony\Component\HttpFoundation\RequestStack())), ($this->privates['var_dumper.server_connection'] ?? $this->getVarDumper_ServerConnectionService()));
    }

    /**
     * Gets the public 'doctrine' shared service.
     *
     * @return \Doctrine\Bundle\DoctrineBundle\Registry
     */
    protected function getDoctrineService()
    {
        return $this->services['doctrine'] = new \Doctrine\Bundle\DoctrineBundle\Registry($this, $this->parameters['doctrine.connections'], $this->parameters['doctrine.entity_managers'], 'default', 'default');
    }

    /**
     * Gets the public 'doctrine.dbal.default_connection' shared service.
     *
     * @return \Doctrine\DBAL\Connection
     */
    protected function getDoctrine_Dbal_DefaultConnectionService()
    {
        $a = new \Doctrine\DBAL\Configuration();

        $b = new \Doctrine\DBAL\Logging\LoggerChain();

        $c = new \Symfony\Bridge\Monolog\Logger('doctrine');
        $c->pushProcessor(($this->privates['debug.log_processor'] ?? $this->getDebug_LogProcessorService()));
        $c->pushHandler(($this->privates['monolog.handler.main'] ?? $this->getMonolog_Handler_MainService()));
        \Symfony\Bundle\FrameworkBundle\DependencyInjection\Compiler\AddDebugLogProcessorPass::configureLogger($c);

        $b->addLogger(new \Symfony\Bridge\Doctrine\Logger\DbalLogger($c, ($this->privates['debug.stopwatch'] ?? ($this->privates['debug.stopwatch'] = new \Symfony\Component\Stopwatch\Stopwatch(true)))));
        $b->addLogger(($this->privates['doctrine.dbal.logger.profiling.default'] ?? ($this->privates['doctrine.dbal.logger.profiling.default'] = new \Doctrine\DBAL\Logging\DebugStack())));

        $a->setSQLLogger($b);
        $d = new \Symfony\Bridge\Doctrine\ContainerAwareEventManager(new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($this->getService, [
            'doctrine.orm.default_listeners.attach_entity_listeners' => ['privates', 'doctrine.orm.default_listeners.attach_entity_listeners', 'getDoctrine_Orm_DefaultListeners_AttachEntityListenersService.php', true],
        ], [
            'doctrine.orm.default_listeners.attach_entity_listeners' => '?',
        ]));
        $d->addEventListener([0 => 'loadClassMetadata'], 'doctrine.orm.default_listeners.attach_entity_listeners');

        return $this->services['doctrine.dbal.default_connection'] = (new \Doctrine\Bundle\DoctrineBundle\ConnectionFactory([]))->createConnection(['driver' => 'pdo_mysql', 'charset' => 'utf8mb4', 'url' => $this->getEnv('resolve:DATABASE_URL'), 'host' => 'localhost', 'port' => NULL, 'user' => 'root', 'password' => NULL, 'driverOptions' => [], 'serverVersion' => '5.7', 'defaultTableOptions' => ['charset' => 'utf8mb4', 'collate' => 'utf8mb4_unicode_ci']], $a, $d, []);
    }

    /**
     * Gets the public 'doctrine.orm.default_entity_manager' shared service.
     *
     * @return \Doctrine\ORM\EntityManager
     */
    protected function getDoctrine_Orm_DefaultEntityManagerService($lazyLoad = true)
    {
        $a = new \Doctrine\ORM\Configuration();

        $b = new \Doctrine\Common\Persistence\Mapping\Driver\MappingDriverChain();
        $b->addDriver(new \Doctrine\ORM\Mapping\Driver\AnnotationDriver(($this->privates['annotations.cached_reader'] ?? $this->getAnnotations_CachedReaderService()), [0 => ($this->targetDirs[3].'\\src\\Entity')]), 'App\\Entity');

        $a->setEntityNamespaces(['App' => 'App\\Entity']);
        $a->setMetadataCacheImpl(($this->services['doctrine_cache.providers.doctrine.orm.default_metadata_cache'] ?? $this->getDoctrineCache_Providers_Doctrine_Orm_DefaultMetadataCacheService()));
        $a->setQueryCacheImpl(($this->services['doctrine_cache.providers.doctrine.orm.default_query_cache'] ?? $this->getDoctrineCache_Providers_Doctrine_Orm_DefaultQueryCacheService()));
        $a->setResultCacheImpl(($this->services['doctrine_cache.providers.doctrine.orm.default_result_cache'] ?? $this->getDoctrineCache_Providers_Doctrine_Orm_DefaultResultCacheService()));
        $a->setMetadataDriverImpl($b);
        $a->setProxyDir(($this->targetDirs[0].'/doctrine/orm/Proxies'));
        $a->setProxyNamespace('Proxies');
        $a->setAutoGenerateProxyClasses(true);
        $a->setClassMetadataFactoryName('Doctrine\\ORM\\Mapping\\ClassMetadataFactory');
        $a->setDefaultRepositoryClassName('Doctrine\\ORM\\EntityRepository');
        $a->setNamingStrategy(new \Doctrine\ORM\Mapping\UnderscoreNamingStrategy());
        $a->setQuoteStrategy(new \Doctrine\ORM\Mapping\DefaultQuoteStrategy());
        $a->setEntityListenerResolver(new \Doctrine\Bundle\DoctrineBundle\Mapping\ContainerEntityListenerResolver($this));
        $a->setRepositoryFactory(new \Doctrine\Bundle\DoctrineBundle\Repository\ContainerRepositoryFactory(new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($this->getService, [
            'App\\Repository\\ColorRepository' => ['privates', 'App\\Repository\\ColorRepository', 'getColorRepositoryService.php', true],
            'App\\Repository\\ContactRepository' => ['privates', 'App\\Repository\\ContactRepository', 'getContactRepositoryService.php', true],
            'App\\Repository\\FormeRepository' => ['privates', 'App\\Repository\\FormeRepository', 'getFormeRepositoryService.php', true],
            'App\\Repository\\ImageRepository' => ['privates', 'App\\Repository\\ImageRepository', 'getImageRepositoryService.php', true],
            'App\\Repository\\LunettesRepository' => ['privates', 'App\\Repository\\LunettesRepository', 'getLunettesRepositoryService.php', true],
            'App\\Repository\\MarqueRepository' => ['privates', 'App\\Repository\\MarqueRepository', 'getMarqueRepositoryService.php', true],
            'App\\Repository\\RegistrationTypeRepository' => ['privates', 'App\\Repository\\RegistrationTypeRepository', 'getRegistrationTypeRepositoryService.php', true],
            'App\\Repository\\StyleRepository' => ['privates', 'App\\Repository\\StyleRepository', 'getStyleRepositoryService.php', true],
            'App\\Repository\\UserRepository' => ['privates', 'App\\Repository\\UserRepository', 'getUserRepositoryService.php', true],
        ], [
            'App\\Repository\\ColorRepository' => '?',
            'App\\Repository\\ContactRepository' => '?',
            'App\\Repository\\FormeRepository' => '?',
            'App\\Repository\\ImageRepository' => '?',
            'App\\Repository\\LunettesRepository' => '?',
            'App\\Repository\\MarqueRepository' => '?',
            'App\\Repository\\RegistrationTypeRepository' => '?',
            'App\\Repository\\StyleRepository' => '?',
            'App\\Repository\\UserRepository' => '?',
        ])));

        $this->services['doctrine.orm.default_entity_manager'] = $instance = \Doctrine\ORM\EntityManager::create(($this->services['doctrine.dbal.default_connection'] ?? $this->getDoctrine_Dbal_DefaultConnectionService()), $a);

        (new \Doctrine\Bundle\DoctrineBundle\ManagerConfigurator([], []))->configure($instance);

        return $instance;
    }

    /**
     * Gets the public 'doctrine_cache.providers.doctrine.orm.default_metadata_cache' shared service.
     *
     * @return \Doctrine\Common\Cache\ArrayCache
     */
    protected function getDoctrineCache_Providers_Doctrine_Orm_DefaultMetadataCacheService()
    {
        $this->services['doctrine_cache.providers.doctrine.orm.default_metadata_cache'] = $instance = new \Doctrine\Common\Cache\ArrayCache();

        $instance->setNamespace('sf_orm_default_9c933f4c6bbd8b24b4b183b933ed218ee5806cdca03bcdfa45463edc85fe0f91');

        return $instance;
    }

    /**
     * Gets the public 'doctrine_cache.providers.doctrine.orm.default_query_cache' shared service.
     *
     * @return \Doctrine\Common\Cache\ArrayCache
     */
    protected function getDoctrineCache_Providers_Doctrine_Orm_DefaultQueryCacheService()
    {
        $this->services['doctrine_cache.providers.doctrine.orm.default_query_cache'] = $instance = new \Doctrine\Common\Cache\ArrayCache();

        $instance->setNamespace('sf_orm_default_9c933f4c6bbd8b24b4b183b933ed218ee5806cdca03bcdfa45463edc85fe0f91');

        return $instance;
    }

    /**
     * Gets the public 'doctrine_cache.providers.doctrine.orm.default_result_cache' shared service.
     *
     * @return \Doctrine\Common\Cache\ArrayCache
     */
    protected function getDoctrineCache_Providers_Doctrine_Orm_DefaultResultCacheService()
    {
        $this->services['doctrine_cache.providers.doctrine.orm.default_result_cache'] = $instance = new \Doctrine\Common\Cache\ArrayCache();

        $instance->setNamespace('sf_orm_default_9c933f4c6bbd8b24b4b183b933ed218ee5806cdca03bcdfa45463edc85fe0f91');

        return $instance;
    }

    /**
     * Gets the public 'easyadmin.config.manager' shared service.
     *
     * @return \EasyCorp\Bundle\EasyAdminBundle\Configuration\ConfigManager
     */
    protected function getEasyadmin_Config_ManagerService()
    {
        $this->services['easyadmin.config.manager'] = $instance = new \EasyCorp\Bundle\EasyAdminBundle\Configuration\ConfigManager($this->parameters['easyadmin.config'], true, ($this->services['easyadmin.property_accessor'] ?? $this->getEasyadmin_PropertyAccessorService()), ($this->privates['cache.easyadmin'] ?? $this->getCache_EasyadminService()));

        $a = ($this->services['easyadmin.filter.registry'] ?? $this->getEasyadmin_Filter_RegistryService());

        $instance->addConfigPass(new \EasyCorp\Bundle\EasyAdminBundle\Configuration\NormalizerConfigPass($this, $a));
        $instance->addConfigPass(new \EasyCorp\Bundle\EasyAdminBundle\Configuration\DesignConfigPass('fr'));
        $instance->addConfigPass(new \EasyCorp\Bundle\EasyAdminBundle\Configuration\MenuConfigPass());
        $instance->addConfigPass(new \EasyCorp\Bundle\EasyAdminBundle\Configuration\ActionConfigPass());
        $instance->addConfigPass(new \EasyCorp\Bundle\EasyAdminBundle\Configuration\MetadataConfigPass(($this->services['doctrine'] ?? $this->getDoctrineService())));
        $instance->addConfigPass(new \EasyCorp\Bundle\EasyAdminBundle\Configuration\PropertyConfigPass(($this->privates['form.registry'] ?? $this->getForm_RegistryService()), $a));
        $instance->addConfigPass(new \EasyCorp\Bundle\EasyAdminBundle\Configuration\ViewConfigPass());
        $instance->addConfigPass(new \EasyCorp\Bundle\EasyAdminBundle\Configuration\TemplateConfigPass(($this->privates['twig.loader.native_filesystem'] ?? $this->getTwig_Loader_NativeFilesystemService())));
        $instance->addConfigPass(new \EasyCorp\Bundle\EasyAdminBundle\Configuration\DefaultConfigPass());

        return $instance;
    }

    /**
     * Gets the public 'easyadmin.filter.registry' shared service.
     *
     * @return \EasyCorp\Bundle\EasyAdminBundle\Form\Filter\FilterRegistry
     */
    protected function getEasyadmin_Filter_RegistryService()
    {
        return $this->services['easyadmin.filter.registry'] = new \EasyCorp\Bundle\EasyAdminBundle\Form\Filter\FilterRegistry(['array' => 'easyadmin.filter.type.array', 'boolean' => 'easyadmin.filter.type.boolean', 'comparison' => 'easyadmin.filter.type.comparison', 'date' => 'easyadmin.filter.type.date', 'dateinterval' => 'easyadmin.filter.type.dateinterval', 'datetime' => 'easyadmin.filter.type.datetime', 'decimal' => 'easyadmin.filter.type.decimal', 'choice' => 'easyadmin.filter.type.choice', 'entity' => 'easyadmin.filter.type.entity', 'float' => 'easyadmin.filter.type.float', 'integer' => 'easyadmin.filter.type.integer', 'text' => 'easyadmin.filter.type.text', 'textarea' => 'easyadmin.filter.type.textarea', 'time' => 'easyadmin.filter.type.time'], new RewindableGenerator(function () {
            yield 0 => ($this->privates['easyadmin.filter.type_guesser.doctrine'] ?? $this->load('getEasyadmin_Filter_TypeGuesser_DoctrineService.php'));
        }, 1));
    }

    /**
     * Gets the public 'easyadmin.listener.controller' shared service.
     *
     * @return \EasyCorp\Bundle\EasyAdminBundle\EventListener\ControllerListener
     */
    protected function getEasyadmin_Listener_ControllerService()
    {
        return $this->services['easyadmin.listener.controller'] = new \EasyCorp\Bundle\EasyAdminBundle\EventListener\ControllerListener(($this->services['easyadmin.config.manager'] ?? $this->getEasyadmin_Config_ManagerService()), ($this->privates['debug.controller_resolver'] ?? $this->getDebug_ControllerResolverService()));
    }

    /**
     * Gets the public 'easyadmin.property_accessor' shared service.
     *
     * @return \Symfony\Component\PropertyAccess\PropertyAccessor
     */
    protected function getEasyadmin_PropertyAccessorService()
    {
        return $this->services['easyadmin.property_accessor'] = new \Symfony\Component\PropertyAccess\PropertyAccessor(false, false, new \Symfony\Component\Cache\Adapter\ArrayAdapter(0, false), true);
    }

    /**
     * Gets the public 'easyadmin.router' shared service.
     *
     * @return \EasyCorp\Bundle\EasyAdminBundle\Router\EasyAdminRouter
     */
    protected function getEasyadmin_RouterService()
    {
        return $this->services['easyadmin.router'] = new \EasyCorp\Bundle\EasyAdminBundle\Router\EasyAdminRouter(($this->services['easyadmin.config.manager'] ?? $this->getEasyadmin_Config_ManagerService()), ($this->services['router'] ?? $this->getRouterService()), ($this->services['easyadmin.property_accessor'] ?? $this->getEasyadmin_PropertyAccessorService()), ($this->services['request_stack'] ?? ($this->services['request_stack'] = new \Symfony\Component\HttpFoundation\RequestStack())));
    }

    /**
     * Gets the public 'easyadmin.security.authorization_checker' shared service.
     *
     * @return \EasyCorp\Bundle\EasyAdminBundle\Security\AuthorizationChecker
     */
    protected function getEasyadmin_Security_AuthorizationCheckerService()
    {
        return $this->services['easyadmin.security.authorization_checker'] = new \EasyCorp\Bundle\EasyAdminBundle\Security\AuthorizationChecker(($this->services['security.authorization_checker'] ?? $this->getSecurity_AuthorizationCheckerService()));
    }

    /**
     * Gets the public 'event_dispatcher' shared service.
     *
     * @return \Symfony\Component\HttpKernel\Debug\TraceableEventDispatcher
     */
    protected function getEventDispatcherService()
    {
        $a = new \Symfony\Bridge\Monolog\Logger('event');
        $a->pushProcessor(($this->privates['debug.log_processor'] ?? $this->getDebug_LogProcessorService()));
        $a->pushHandler(new \Monolog\Handler\NullHandler());
        \Symfony\Bundle\FrameworkBundle\DependencyInjection\Compiler\AddDebugLogProcessorPass::configureLogger($a);

        $this->services['event_dispatcher'] = $instance = new \Symfony\Component\HttpKernel\Debug\TraceableEventDispatcher(new \Symfony\Component\EventDispatcher\EventDispatcher(), ($this->privates['debug.stopwatch'] ?? ($this->privates['debug.stopwatch'] = new \Symfony\Component\Stopwatch\Stopwatch(true))), $a, ($this->services['request_stack'] ?? ($this->services['request_stack'] = new \Symfony\Component\HttpFoundation\RequestStack())));

        $instance->addListener('kernel.controller', [0 => function () {
            return ($this->privates['data_collector.router'] ?? ($this->privates['data_collector.router'] = new \Symfony\Bundle\FrameworkBundle\DataCollector\RouterDataCollector()));
        }, 1 => 'onKernelController'], 0);
        $instance->addListener('kernel.controller', [0 => function () {
            return ($this->services['easyadmin.listener.controller'] ?? $this->getEasyadmin_Listener_ControllerService());
        }, 1 => 'onKernelController'], 0);
        $instance->addListener('easy_admin.post_initialize', [0 => function () {
            return ($this->services['easyadmin.listener.request_post_initialize'] ?? $this->load('getEasyadmin_Listener_RequestPostInitializeService.php'));
        }, 1 => 'initializeRequest'], 0);
        $instance->addListener('kernel.request', [0 => function () {
            return ($this->privates['knp_paginator.subscriber.sliding_pagination'] ?? $this->getKnpPaginator_Subscriber_SlidingPaginationService());
        }, 1 => 'onKernelRequest'], 0);
        $instance->addListener('kernel.response', [0 => function () {
            return ($this->privates['response_listener'] ?? ($this->privates['response_listener'] = new \Symfony\Component\HttpKernel\EventListener\ResponseListener('UTF-8')));
        }, 1 => 'onKernelResponse'], 0);
        $instance->addListener('kernel.response', [0 => function () {
            return ($this->privates['streamed_response_listener'] ?? ($this->privates['streamed_response_listener'] = new \Symfony\Component\HttpKernel\EventListener\StreamedResponseListener()));
        }, 1 => 'onKernelResponse'], -1024);
        $instance->addListener('kernel.request', [0 => function () {
            return ($this->privates['locale_listener'] ?? $this->getLocaleListenerService());
        }, 1 => 'setDefaultLocale'], 100);
        $instance->addListener('kernel.request', [0 => function () {
            return ($this->privates['locale_listener'] ?? $this->getLocaleListenerService());
        }, 1 => 'onKernelRequest'], 16);
        $instance->addListener('kernel.finish_request', [0 => function () {
            return ($this->privates['locale_listener'] ?? $this->getLocaleListenerService());
        }, 1 => 'onKernelFinishRequest'], 0);
        $instance->addListener('kernel.request', [0 => function () {
            return ($this->privates['validate_request_listener'] ?? ($this->privates['validate_request_listener'] = new \Symfony\Component\HttpKernel\EventListener\ValidateRequestListener()));
        }, 1 => 'onKernelRequest'], 256);
        $instance->addListener('kernel.request', [0 => function () {
            return ($this->privates['resolve_controller_name_subscriber'] ?? $this->getResolveControllerNameSubscriberService());
        }, 1 => 'onKernelRequest'], 24);
        $instance->addListener('kernel.response', [0 => function () {
            return ($this->privates['disallow_search_engine_index_response_listener'] ?? ($this->privates['disallow_search_engine_index_response_listener'] = new \Symfony\Component\HttpKernel\EventListener\DisallowRobotsIndexingListener()));
        }, 1 => 'onResponse'], -255);
        $instance->addListener('kernel.request', [0 => function () {
            return ($this->privates['locale_aware_listener'] ?? $this->getLocaleAwareListenerService());
        }, 1 => 'onKernelRequest'], 15);
        $instance->addListener('kernel.finish_request', [0 => function () {
            return ($this->privates['locale_aware_listener'] ?? $this->getLocaleAwareListenerService());
        }, 1 => 'onKernelFinishRequest'], -15);
        $instance->addListener('console.error', [0 => function () {
            return ($this->privates['console.error_listener'] ?? $this->load('getConsole_ErrorListenerService.php'));
        }, 1 => 'onConsoleError'], -128);
        $instance->addListener('console.terminate', [0 => function () {
            return ($this->privates['console.error_listener'] ?? $this->load('getConsole_ErrorListenerService.php'));
        }, 1 => 'onConsoleTerminate'], -128);
        $instance->addListener('console.error', [0 => function () {
            return ($this->privates['console.suggest_missing_package_subscriber'] ?? ($this->privates['console.suggest_missing_package_subscriber'] = new \Symfony\Bundle\FrameworkBundle\EventListener\SuggestMissingPackageSubscriber()));
        }, 1 => 'onConsoleError'], 0);
        $instance->addListener('kernel.request', [0 => function () {
            return ($this->privates['session_listener'] ?? $this->getSessionListenerService());
        }, 1 => 'onKernelRequest'], 128);
        $instance->addListener('kernel.response', [0 => function () {
            return ($this->privates['session_listener'] ?? $this->getSessionListenerService());
        }, 1 => 'onKernelResponse'], -1000);
        $instance->addListener('kernel.finish_request', [0 => function () {
            return ($this->privates['session_listener'] ?? $this->getSessionListenerService());
        }, 1 => 'onFinishRequest'], 0);
        $instance->addListener('kernel.response', [0 => function () {
            return ($this->privates['profiler_listener'] ?? $this->getProfilerListenerService());
        }, 1 => 'onKernelResponse'], -100);
        $instance->addListener('kernel.exception', [0 => function () {
            return ($this->privates['profiler_listener'] ?? $this->getProfilerListenerService());
        }, 1 => 'onKernelException'], 0);
        $instance->addListener('kernel.terminate', [0 => function () {
            return ($this->privates['profiler_listener'] ?? $this->getProfilerListenerService());
        }, 1 => 'onKernelTerminate'], -1024);
        $instance->addListener('kernel.controller', [0 => function () {
            return ($this->privates['data_collector.request'] ?? ($this->privates['data_collector.request'] = new \Symfony\Component\HttpKernel\DataCollector\RequestDataCollector()));
        }, 1 => 'onKernelController'], 0);
        $instance->addListener('kernel.response', [0 => function () {
            return ($this->privates['data_collector.request'] ?? ($this->privates['data_collector.request'] = new \Symfony\Component\HttpKernel\DataCollector\RequestDataCollector()));
        }, 1 => 'onKernelResponse'], 0);
        $instance->addListener('kernel.request', [0 => function () {
            return ($this->privates['debug.debug_handlers_listener'] ?? $this->getDebug_DebugHandlersListenerService());
        }, 1 => 'configure'], 2048);
        $instance->addListener('console.command', [0 => function () {
            return ($this->privates['debug.debug_handlers_listener'] ?? $this->getDebug_DebugHandlersListenerService());
        }, 1 => 'configure'], 2048);
        $instance->addListener('kernel.exception', [0 => function () {
            return ($this->privates['debug.debug_handlers_listener'] ?? $this->getDebug_DebugHandlersListenerService());
        }, 1 => 'onKernelException'], -2048);
        $instance->addListener('kernel.request', [0 => function () {
            return ($this->privates['router_listener'] ?? $this->getRouterListenerService());
        }, 1 => 'onKernelRequest'], 32);
        $instance->addListener('kernel.finish_request', [0 => function () {
            return ($this->privates['router_listener'] ?? $this->getRouterListenerService());
        }, 1 => 'onKernelFinishRequest'], 0);
        $instance->addListener('kernel.exception', [0 => function () {
            return ($this->privates['router_listener'] ?? $this->getRouterListenerService());
        }, 1 => 'onKernelException'], -64);
        $instance->addListener('kernel.response', [0 => function () {
            return ($this->privates['web_link.add_link_header_listener'] ?? ($this->privates['web_link.add_link_header_listener'] = new \Symfony\Component\WebLink\EventListener\AddLinkHeaderListener()));
        }, 1 => 'onKernelResponse'], 0);
        $instance->addListener('kernel.controller', [0 => function () {
            return ($this->privates['sensio_framework_extra.controller.listener'] ?? $this->getSensioFrameworkExtra_Controller_ListenerService());
        }, 1 => 'onKernelController'], 0);
        $instance->addListener('kernel.controller', [0 => function () {
            return ($this->privates['sensio_framework_extra.converter.listener'] ?? $this->getSensioFrameworkExtra_Converter_ListenerService());
        }, 1 => 'onKernelController'], 0);
        $instance->addListener('kernel.controller', [0 => function () {
            return ($this->privates['sensio_framework_extra.view.listener'] ?? $this->getSensioFrameworkExtra_View_ListenerService());
        }, 1 => 'onKernelController'], -128);
        $instance->addListener('kernel.view', [0 => function () {
            return ($this->privates['sensio_framework_extra.view.listener'] ?? $this->getSensioFrameworkExtra_View_ListenerService());
        }, 1 => 'onKernelView'], 0);
        $instance->addListener('kernel.controller', [0 => function () {
            return ($this->privates['sensio_framework_extra.cache.listener'] ?? ($this->privates['sensio_framework_extra.cache.listener'] = new \Sensio\Bundle\FrameworkExtraBundle\EventListener\HttpCacheListener()));
        }, 1 => 'onKernelController'], 0);
        $instance->addListener('kernel.response', [0 => function () {
            return ($this->privates['sensio_framework_extra.cache.listener'] ?? ($this->privates['sensio_framework_extra.cache.listener'] = new \Sensio\Bundle\FrameworkExtraBundle\EventListener\HttpCacheListener()));
        }, 1 => 'onKernelResponse'], 0);
        $instance->addListener('kernel.controller_arguments', [0 => function () {
            return ($this->privates['sensio_framework_extra.security.listener'] ?? $this->getSensioFrameworkExtra_Security_ListenerService());
        }, 1 => 'onKernelControllerArguments'], 0);
        $instance->addListener('kernel.controller_arguments', [0 => function () {
            return ($this->privates['framework_extra_bundle.event.is_granted'] ?? $this->getFrameworkExtraBundle_Event_IsGrantedService());
        }, 1 => 'onKernelControllerArguments'], 0);
        $instance->addListener('kernel.response', [0 => function () {
            return ($this->privates['security.rememberme.response_listener'] ?? ($this->privates['security.rememberme.response_listener'] = new \Symfony\Component\Security\Http\RememberMe\ResponseListener()));
        }, 1 => 'onKernelResponse'], 0);
        $instance->addListener('debug.security.authorization.vote', [0 => function () {
            return ($this->privates['debug.security.voter.vote_listener'] ?? $this->load('getDebug_Security_Voter_VoteListenerService.php'));
        }, 1 => 'onVoterVote'], 0);
        $instance->addListener('kernel.request', [0 => function () {
            return ($this->privates['debug.security.firewall'] ?? $this->getDebug_Security_FirewallService());
        }, 1 => 'configureLogoutUrlGenerator'], 8);
        $instance->addListener('kernel.request', [0 => function () {
            return ($this->privates['debug.security.firewall'] ?? $this->getDebug_Security_FirewallService());
        }, 1 => 'onKernelRequest'], 8);
        $instance->addListener('kernel.finish_request', [0 => function () {
            return ($this->privates['debug.security.firewall'] ?? $this->getDebug_Security_FirewallService());
        }, 1 => 'onKernelFinishRequest'], 0);
        $instance->addListener('kernel.exception', [0 => function () {
            return ($this->privates['swiftmailer.email_sender.listener'] ?? $this->load('getSwiftmailer_EmailSender_ListenerService.php'));
        }, 1 => 'onException'], 0);
        $instance->addListener('kernel.terminate', [0 => function () {
            return ($this->privates['swiftmailer.email_sender.listener'] ?? $this->load('getSwiftmailer_EmailSender_ListenerService.php'));
        }, 1 => 'onTerminate'], 0);
        $instance->addListener('console.error', [0 => function () {
            return ($this->privates['swiftmailer.email_sender.listener'] ?? $this->load('getSwiftmailer_EmailSender_ListenerService.php'));
        }, 1 => 'onException'], 0);
        $instance->addListener('console.terminate', [0 => function () {
            return ($this->privates['swiftmailer.email_sender.listener'] ?? $this->load('getSwiftmailer_EmailSender_ListenerService.php'));
        }, 1 => 'onTerminate'], 0);
        $instance->addListener('kernel.exception', [0 => function () {
            return ($this->privates['twig.exception_listener'] ?? $this->load('getTwig_ExceptionListenerService.php'));
        }, 1 => 'logKernelException'], 0);
        $instance->addListener('kernel.exception', [0 => function () {
            return ($this->privates['twig.exception_listener'] ?? $this->load('getTwig_ExceptionListenerService.php'));
        }, 1 => 'onKernelException'], -128);
        $instance->addListener('kernel.response', [0 => function () {
            return ($this->privates['web_profiler.debug_toolbar'] ?? $this->getWebProfiler_DebugToolbarService());
        }, 1 => 'onKernelResponse'], -128);
        $instance->addListener('console.command', [0 => function () {
            return ($this->privates['monolog.handler.console'] ?? $this->getMonolog_Handler_ConsoleService());
        }, 1 => 'onCommand'], 255);
        $instance->addListener('console.terminate', [0 => function () {
            return ($this->privates['monolog.handler.console'] ?? $this->getMonolog_Handler_ConsoleService());
        }, 1 => 'onTerminate'], -255);
        $instance->addListener('console.command', [0 => function () {
            return ($this->privates['debug.dump_listener'] ?? $this->load('getDebug_DumpListenerService.php'));
        }, 1 => 'configure'], 1024);
        $instance->addListener('console.error', [0 => function () {
            return ($this->privates['maker.console_error_listener'] ?? ($this->privates['maker.console_error_listener'] = new \Symfony\Bundle\MakerBundle\Event\ConsoleErrorSubscriber()));
        }, 1 => 'onConsoleError'], 0);
        $instance->addListener('console.terminate', [0 => function () {
            return ($this->privates['maker.console_error_listener'] ?? ($this->privates['maker.console_error_listener'] = new \Symfony\Bundle\MakerBundle\Event\ConsoleErrorSubscriber()));
        }, 1 => 'onConsoleTerminate'], 0);
        $instance->addListener('knp_pager.before', [0 => function () {
            return ($this->privates['knp_paginator.subscriber.paginate'] ?? ($this->privates['knp_paginator.subscriber.paginate'] = new \Knp\Component\Pager\Event\Subscriber\Paginate\PaginationSubscriber()));
        }, 1 => 'before'], 0);
        $instance->addListener('knp_pager.pagination', [0 => function () {
            return ($this->privates['knp_paginator.subscriber.paginate'] ?? ($this->privates['knp_paginator.subscriber.paginate'] = new \Knp\Component\Pager\Event\Subscriber\Paginate\PaginationSubscriber()));
        }, 1 => 'pagination'], 0);
        $instance->addListener('knp_pager.before', [0 => function () {
            return ($this->privates['knp_paginator.subscriber.sortable'] ?? ($this->privates['knp_paginator.subscriber.sortable'] = new \Knp\Component\Pager\Event\Subscriber\Sortable\SortableSubscriber()));
        }, 1 => 'before'], 1);
        $instance->addListener('knp_pager.before', [0 => function () {
            return ($this->privates['knp_paginator.subscriber.filtration'] ?? ($this->privates['knp_paginator.subscriber.filtration'] = new \Knp\Component\Pager\Event\Subscriber\Filtration\FiltrationSubscriber()));
        }, 1 => 'before'], 1);
        $instance->addListener('knp_pager.pagination', [0 => function () {
            return ($this->privates['knp_paginator.subscriber.sliding_pagination'] ?? $this->getKnpPaginator_Subscriber_SlidingPaginationService());
        }, 1 => 'pagination'], 1);

        return $instance;
    }

    /**
     * Gets the public 'filesystem' shared service.
     *
     * @return \Symfony\Component\Filesystem\Filesystem
     */
    protected function getFilesystemService()
    {
        return $this->services['filesystem'] = new \Symfony\Component\Filesystem\Filesystem();
    }

    /**
     * Gets the public 'http_kernel' shared service.
     *
     * @return \Symfony\Component\HttpKernel\HttpKernel
     */
    protected function getHttpKernelService()
    {
        return $this->services['http_kernel'] = new \Symfony\Component\HttpKernel\HttpKernel(($this->services['event_dispatcher'] ?? $this->getEventDispatcherService()), ($this->privates['debug.controller_resolver'] ?? $this->getDebug_ControllerResolverService()), ($this->services['request_stack'] ?? ($this->services['request_stack'] = new \Symfony\Component\HttpFoundation\RequestStack())), new \Symfony\Component\HttpKernel\Controller\TraceableArgumentResolver(new \Symfony\Component\HttpKernel\Controller\ArgumentResolver(($this->privates['argument_metadata_factory'] ?? ($this->privates['argument_metadata_factory'] = new \Symfony\Component\HttpKernel\ControllerMetadata\ArgumentMetadataFactory())), new RewindableGenerator(function () {
            yield 0 => ($this->privates['debug.argument_resolver.request_attribute'] ?? $this->load('getDebug_ArgumentResolver_RequestAttributeService.php'));
            yield 1 => ($this->privates['debug.argument_resolver.request'] ?? $this->load('getDebug_ArgumentResolver_RequestService.php'));
            yield 2 => ($this->privates['debug.argument_resolver.session'] ?? $this->load('getDebug_ArgumentResolver_SessionService.php'));
            yield 3 => ($this->privates['debug.security.user_value_resolver'] ?? $this->load('getDebug_Security_UserValueResolverService.php'));
            yield 4 => ($this->privates['debug.argument_resolver.service'] ?? $this->load('getDebug_ArgumentResolver_ServiceService.php'));
            yield 5 => ($this->privates['debug.argument_resolver.default'] ?? $this->load('getDebug_ArgumentResolver_DefaultService.php'));
            yield 6 => ($this->privates['debug.argument_resolver.variadic'] ?? $this->load('getDebug_ArgumentResolver_VariadicService.php'));
            yield 7 => ($this->privates['debug.argument_resolver.not_tagged_controller'] ?? $this->load('getDebug_ArgumentResolver_NotTaggedControllerService.php'));
        }, 8)), ($this->privates['debug.stopwatch'] ?? ($this->privates['debug.stopwatch'] = new \Symfony\Component\Stopwatch\Stopwatch(true)))));
    }

    /**
     * Gets the public 'liip_imagine.cache.manager' shared service.
     *
     * @return \Liip\ImagineBundle\Imagine\Cache\CacheManager
     */
    protected function getLiipImagine_Cache_ManagerService()
    {
        $this->services['liip_imagine.cache.manager'] = $instance = new \Liip\ImagineBundle\Imagine\Cache\CacheManager(($this->privates['liip_imagine.filter.configuration'] ?? $this->getLiipImagine_Filter_ConfigurationService()), ($this->services['router'] ?? $this->getRouterService()), ($this->services['liip_imagine.cache.signer'] ?? ($this->services['liip_imagine.cache.signer'] = new \Liip\ImagineBundle\Imagine\Cache\Signer($this->getEnv('APP_SECRET')))), ($this->services['event_dispatcher'] ?? $this->getEventDispatcherService()), 'default');

        $instance->addResolver('default', ($this->services['liip_imagine.cache.resolver.default'] ?? $this->getLiipImagine_Cache_Resolver_DefaultService()));
        $instance->addResolver('no_cache', ($this->services['liip_imagine.cache.resolver.no_cache_web_path'] ?? $this->getLiipImagine_Cache_Resolver_NoCacheWebPathService()));

        return $instance;
    }

    /**
     * Gets the public 'liip_imagine.cache.resolver.default' shared service.
     *
     * @return \Liip\ImagineBundle\Imagine\Cache\Resolver\WebPathResolver
     */
    protected function getLiipImagine_Cache_Resolver_DefaultService()
    {
        return $this->services['liip_imagine.cache.resolver.default'] = new \Liip\ImagineBundle\Imagine\Cache\Resolver\WebPathResolver(($this->services['filesystem'] ?? ($this->services['filesystem'] = new \Symfony\Component\Filesystem\Filesystem())), ($this->privates['router.request_context'] ?? $this->getRouter_RequestContextService()), ($this->targetDirs[3].'/public'), 'media/cache');
    }

    /**
     * Gets the public 'liip_imagine.cache.resolver.no_cache_web_path' shared service.
     *
     * @return \Liip\ImagineBundle\Imagine\Cache\Resolver\NoCacheWebPathResolver
     */
    protected function getLiipImagine_Cache_Resolver_NoCacheWebPathService()
    {
        return $this->services['liip_imagine.cache.resolver.no_cache_web_path'] = new \Liip\ImagineBundle\Imagine\Cache\Resolver\NoCacheWebPathResolver(($this->privates['router.request_context'] ?? $this->getRouter_RequestContextService()));
    }

    /**
     * Gets the public 'liip_imagine.cache.signer' shared service.
     *
     * @return \Liip\ImagineBundle\Imagine\Cache\Signer
     */
    protected function getLiipImagine_Cache_SignerService()
    {
        return $this->services['liip_imagine.cache.signer'] = new \Liip\ImagineBundle\Imagine\Cache\Signer($this->getEnv('APP_SECRET'));
    }

    /**
     * Gets the public 'profiler' shared service.
     *
     * @return \Symfony\Component\HttpKernel\Profiler\Profiler
     */
    protected function getProfilerService()
    {
        $a = new \Symfony\Bridge\Monolog\Logger('profiler');
        $a->pushProcessor(($this->privates['debug.log_processor'] ?? $this->getDebug_LogProcessorService()));
        $a->pushHandler(($this->privates['monolog.handler.console'] ?? $this->getMonolog_Handler_ConsoleService()));
        $a->pushHandler(($this->privates['monolog.handler.main'] ?? $this->getMonolog_Handler_MainService()));
        \Symfony\Bundle\FrameworkBundle\DependencyInjection\Compiler\AddDebugLogProcessorPass::configureLogger($a);

        $this->services['profiler'] = $instance = new \Symfony\Component\HttpKernel\Profiler\Profiler(new \Symfony\Component\HttpKernel\Profiler\FileProfilerStorage(('file:'.$this->targetDirs[0].'/profiler')), $a, true);

        $b = ($this->services['kernel'] ?? $this->get('kernel'));
        $c = ($this->services['request_stack'] ?? ($this->services['request_stack'] = new \Symfony\Component\HttpFoundation\RequestStack()));
        $d = new \Symfony\Component\Cache\DataCollector\CacheDataCollector();
        $d->addInstance('cache.app', ($this->services['cache.app'] ?? $this->getCache_AppService()));
        $d->addInstance('cache.system', ($this->services['cache.system'] ?? $this->getCache_SystemService()));
        $d->addInstance('cache.validator', ($this->privates['cache.validator'] ?? $this->getCache_ValidatorService()));
        $d->addInstance('cache.serializer', ($this->privates['cache.serializer'] ?? $this->getCache_SerializerService()));
        $d->addInstance('cache.annotations', ($this->privates['cache.annotations'] ?? $this->getCache_AnnotationsService()));
        $d->addInstance('cache.property_info', ($this->privates['cache.property_info'] ?? $this->getCache_PropertyInfoService()));
        $d->addInstance('cache.messenger.restart_workers_signal', ($this->privates['cache.messenger.restart_workers_signal'] ?? $this->getCache_Messenger_RestartWorkersSignalService()));
        $d->addInstance('cache.security_expression_language', ($this->privates['cache.security_expression_language'] ?? $this->getCache_SecurityExpressionLanguageService()));
        $d->addInstance('cache.easyadmin', ($this->privates['cache.easyadmin'] ?? $this->getCache_EasyadminService()));
        $e = new \Doctrine\Bundle\DoctrineBundle\DataCollector\DoctrineDataCollector(($this->services['doctrine'] ?? $this->getDoctrineService()));
        $e->addLogger('default', ($this->privates['doctrine.dbal.logger.profiling.default'] ?? ($this->privates['doctrine.dbal.logger.profiling.default'] = new \Doctrine\DBAL\Logging\DebugStack())));
        $f = new \Symfony\Component\HttpKernel\DataCollector\ConfigDataCollector();
        if ($this->has('kernel')) {
            $f->setKernel($b);
        }

        $instance->add(($this->privates['data_collector.request'] ?? ($this->privates['data_collector.request'] = new \Symfony\Component\HttpKernel\DataCollector\RequestDataCollector())));
        $instance->add(new \Symfony\Component\HttpKernel\DataCollector\TimeDataCollector($b, ($this->privates['debug.stopwatch'] ?? ($this->privates['debug.stopwatch'] = new \Symfony\Component\Stopwatch\Stopwatch(true)))));
        $instance->add(new \Symfony\Component\HttpKernel\DataCollector\MemoryDataCollector());
        $instance->add(new \Symfony\Component\Validator\DataCollector\ValidatorDataCollector(($this->services['validator'] ?? $this->getValidatorService())));
        $instance->add(new \Symfony\Component\HttpKernel\DataCollector\AjaxDataCollector());
        $instance->add(($this->privates['data_collector.form'] ?? $this->getDataCollector_FormService()));
        $instance->add(new \Symfony\Component\HttpKernel\DataCollector\ExceptionDataCollector());
        $instance->add(new \Symfony\Component\HttpKernel\DataCollector\LoggerDataCollector($a, ($this->targetDirs[0].'/srcApp_KernelDevDebugContainer'), $c));
        $instance->add(new \Symfony\Component\HttpKernel\DataCollector\EventDataCollector(($this->services['event_dispatcher'] ?? $this->getEventDispatcherService()), $c));
        $instance->add(($this->privates['data_collector.router'] ?? ($this->privates['data_collector.router'] = new \Symfony\Bundle\FrameworkBundle\DataCollector\RouterDataCollector())));
        $instance->add($d);
        $instance->add(new \Symfony\Component\Translation\DataCollector\TranslationDataCollector(($this->services['translator'] ?? $this->getTranslatorService())));
        $instance->add(new \Symfony\Bundle\SecurityBundle\DataCollector\SecurityDataCollector(($this->services['security.token_storage'] ?? ($this->services['security.token_storage'] = new \Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage())), ($this->privates['security.role_hierarchy'] ?? $this->getSecurity_RoleHierarchyService()), ($this->privates['security.logout_url_generator'] ?? $this->getSecurity_LogoutUrlGeneratorService()), ($this->privates['debug.security.access.decision_manager'] ?? $this->getDebug_Security_Access_DecisionManagerService()), ($this->privates['security.firewall.map'] ?? $this->getSecurity_Firewall_MapService()), ($this->privates['debug.security.firewall'] ?? $this->getDebug_Security_FirewallService())));
        $instance->add(new \Symfony\Bridge\Twig\DataCollector\TwigDataCollector(($this->privates['twig.profile'] ?? ($this->privates['twig.profile'] = new \Twig\Profiler\Profile())), ($this->services['twig'] ?? $this->getTwigService())));
        $instance->add($e);
        $instance->add(new \Symfony\Bundle\SwiftmailerBundle\DataCollector\MessageDataCollector($this));
        $instance->add(($this->services['data_collector.dump'] ?? $this->getDataCollector_DumpService()));
        $instance->add(new \EasyCorp\Bundle\EasyAdminBundle\DataCollector\EasyAdminDataCollector(($this->services['easyadmin.config.manager'] ?? $this->getEasyadmin_Config_ManagerService())));
        $instance->add($f);

        return $instance;
    }

    /**
     * Gets the public 'request_stack' shared service.
     *
     * @return \Symfony\Component\HttpFoundation\RequestStack
     */
    protected function getRequestStackService()
    {
        return $this->services['request_stack'] = new \Symfony\Component\HttpFoundation\RequestStack();
    }

    /**
     * Gets the public 'router' shared service.
     *
     * @return \Symfony\Bundle\FrameworkBundle\Routing\Router
     */
    protected function getRouterService()
    {
        $a = new \Symfony\Bridge\Monolog\Logger('router');
        $a->pushProcessor(($this->privates['debug.log_processor'] ?? $this->getDebug_LogProcessorService()));
        $a->pushHandler(($this->privates['monolog.handler.console'] ?? $this->getMonolog_Handler_ConsoleService()));
        $a->pushHandler(($this->privates['monolog.handler.main'] ?? $this->getMonolog_Handler_MainService()));
        \Symfony\Bundle\FrameworkBundle\DependencyInjection\Compiler\AddDebugLogProcessorPass::configureLogger($a);

        $this->services['router'] = $instance = new \Symfony\Bundle\FrameworkBundle\Routing\Router((new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($this->getService, [
            'routing.loader' => ['services', 'routing.loader', 'getRouting_LoaderService.php', true],
        ], [
            'routing.loader' => 'Symfony\\Component\\Config\\Loader\\LoaderInterface',
        ]))->withContext('router.default', $this), 'kernel::loadRoutes', ['cache_dir' => $this->targetDirs[0], 'debug' => true, 'generator_class' => 'Symfony\\Component\\Routing\\Generator\\CompiledUrlGenerator', 'generator_dumper_class' => 'Symfony\\Component\\Routing\\Generator\\Dumper\\CompiledUrlGeneratorDumper', 'matcher_class' => 'Symfony\\Bundle\\FrameworkBundle\\Routing\\RedirectableCompiledUrlMatcher', 'matcher_dumper_class' => 'Symfony\\Component\\Routing\\Matcher\\Dumper\\CompiledUrlMatcherDumper', 'strict_requirements' => true, 'resource_type' => 'service'], ($this->privates['router.request_context'] ?? $this->getRouter_RequestContextService()), ($this->privates['parameter_bag'] ?? ($this->privates['parameter_bag'] = new \Symfony\Component\DependencyInjection\ParameterBag\ContainerBag($this))), $a, 'fr');

        $instance->setConfigCacheFactory(($this->privates['config_cache_factory'] ?? $this->getConfigCacheFactoryService()));

        return $instance;
    }

    /**
     * Gets the public 'security.authorization_checker' shared service.
     *
     * @return \Symfony\Component\Security\Core\Authorization\AuthorizationChecker
     */
    protected function getSecurity_AuthorizationCheckerService()
    {
        return $this->services['security.authorization_checker'] = new \Symfony\Component\Security\Core\Authorization\AuthorizationChecker(($this->services['security.token_storage'] ?? ($this->services['security.token_storage'] = new \Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage())), ($this->privates['security.authentication.manager'] ?? $this->getSecurity_Authentication_ManagerService()), ($this->privates['debug.security.access.decision_manager'] ?? $this->getDebug_Security_Access_DecisionManagerService()), false);
    }

    /**
     * Gets the public 'security.token_storage' shared service.
     *
     * @return \Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage
     */
    protected function getSecurity_TokenStorageService()
    {
        return $this->services['security.token_storage'] = new \Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage();
    }

    /**
     * Gets the public 'translator' shared service.
     *
     * @return \Symfony\Component\Translation\DataCollectorTranslator
     */
    protected function getTranslatorService()
    {
        return $this->services['translator'] = new \Symfony\Component\Translation\DataCollectorTranslator(($this->privates['translator.default'] ?? $this->getTranslator_DefaultService()));
    }

    /**
     * Gets the public 'twig' shared service.
     *
     * @return \Twig\Environment
     */
    protected function getTwigService()
    {
        $this->services['twig'] = $instance = new \Twig\Environment(($this->privates['twig.loader.native_filesystem'] ?? $this->getTwig_Loader_NativeFilesystemService()), ['default_path' => ($this->targetDirs[3].'/templates'), 'debug' => true, 'strict_variables' => true, 'exception_controller' => 'twig.controller.exception::showAction', 'form_themes' => [0 => 'form_div_layout.html.twig'], 'autoescape' => 'name', 'cache' => ($this->targetDirs[0].'/twig'), 'charset' => 'UTF-8', 'paths' => [], 'date' => ['format' => 'F j, Y H:i', 'interval_format' => '%d days', 'timezone' => NULL], 'number_format' => ['decimals' => 0, 'decimal_point' => '.', 'thousands_separator' => ',']]);

        $a = ($this->privates['security.logout_url_generator'] ?? $this->getSecurity_LogoutUrlGeneratorService());
        $b = ($this->privates['debug.stopwatch'] ?? ($this->privates['debug.stopwatch'] = new \Symfony\Component\Stopwatch\Stopwatch(true)));
        $c = ($this->services['translator'] ?? $this->getTranslatorService());
        $d = ($this->services['request_stack'] ?? ($this->services['request_stack'] = new \Symfony\Component\HttpFoundation\RequestStack()));
        $e = ($this->privates['debug.file_link_formatter'] ?? $this->getDebug_FileLinkFormatterService());
        $f = ($this->services['router'] ?? $this->getRouterService());
        $g = new \Symfony\Component\VarDumper\Dumper\HtmlDumper(NULL, 'UTF-8', 1);
        $g->setDisplayOptions(['maxStringLength' => 4096, 'fileLinkFormat' => $e]);
        $h = new \Symfony\Bridge\Twig\AppVariable();
        $h->setEnvironment('dev');
        $h->setDebug(true);
        if ($this->has('security.token_storage')) {
            $h->setTokenStorage(($this->services['security.token_storage'] ?? ($this->services['security.token_storage'] = new \Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage())));
        }
        if ($this->has('request_stack')) {
            $h->setRequestStack($d);
        }

        $instance->addExtension(new \Symfony\Bridge\Twig\Extension\CsrfExtension());
        $instance->addExtension(new \Symfony\Bridge\Twig\Extension\LogoutUrlExtension($a));
        $instance->addExtension(new \Symfony\Bridge\Twig\Extension\SecurityExtension(($this->services['security.authorization_checker'] ?? $this->getSecurity_AuthorizationCheckerService())));
        $instance->addExtension(new \Symfony\Bridge\Twig\Extension\ProfilerExtension(($this->privates['twig.profile'] ?? ($this->privates['twig.profile'] = new \Twig\Profiler\Profile())), $b));
        $instance->addExtension(new \Symfony\Bridge\Twig\Extension\TranslationExtension($c));
        $instance->addExtension(new \Symfony\Bridge\Twig\Extension\AssetExtension(new \Symfony\Component\Asset\Packages(new \Symfony\Component\Asset\PathPackage('', new \Symfony\Component\Asset\VersionStrategy\EmptyVersionStrategy(), new \Symfony\Component\Asset\Context\RequestStackContext($d, '', false)), [])));
        $instance->addExtension(new \Symfony\Bridge\Twig\Extension\CodeExtension($e, $this->targetDirs[3], 'UTF-8'));
        $instance->addExtension(new \Symfony\Bridge\Twig\Extension\RoutingExtension($f));
        $instance->addExtension(new \Symfony\Bridge\Twig\Extension\YamlExtension());
        $instance->addExtension(new \Symfony\Bridge\Twig\Extension\StopwatchExtension($b, true));
        $instance->addExtension(new \Symfony\Bridge\Twig\Extension\ExpressionExtension());
        $instance->addExtension(new \Symfony\Bridge\Twig\Extension\HttpKernelExtension());
        $instance->addExtension(new \Symfony\Bridge\Twig\Extension\HttpFoundationExtension(new \Symfony\Component\HttpFoundation\UrlHelper($d, ($this->privates['router.request_context'] ?? $this->getRouter_RequestContextService()))));
        $instance->addExtension(new \Symfony\Bridge\Twig\Extension\WebLinkExtension($d));
        $instance->addExtension(new \Symfony\Bridge\Twig\Extension\FormExtension([0 => $this, 1 => 'twig.form.renderer']));
        $instance->addExtension(new \Symfony\Bridge\Twig\Extension\DumpExtension(($this->services['var_dumper.cloner'] ?? $this->getVarDumper_ClonerService()), ($this->privates['var_dumper.html_dumper'] ?? $this->getVarDumper_HtmlDumperService())));
        $instance->addExtension(new \Doctrine\Bundle\DoctrineBundle\Twig\DoctrineExtension());
        $instance->addExtension(new \Symfony\Bundle\WebProfilerBundle\Twig\WebProfilerExtension($g));
        $instance->addExtension(new \EasyCorp\Bundle\EasyAdminBundle\Twig\EasyAdminTwigExtension(($this->services['easyadmin.config.manager'] ?? $this->getEasyadmin_Config_ManagerService()), ($this->services['easyadmin.property_accessor'] ?? $this->getEasyadmin_PropertyAccessorService()), ($this->services['easyadmin.router'] ?? $this->getEasyadmin_RouterService()), true, $a, $c, ($this->services['easyadmin.security.authorization_checker'] ?? $this->getEasyadmin_Security_AuthorizationCheckerService())));
        $instance->addExtension(new \Liip\ImagineBundle\Templating\FilterExtension(($this->services['liip_imagine.cache.manager'] ?? $this->getLiipImagine_Cache_ManagerService())));
        $instance->addExtension(new \Knp\Bundle\PaginatorBundle\Twig\Extension\PaginationExtension(new \Knp\Bundle\PaginatorBundle\Helper\Processor($f, $c)));
        $instance->addGlobal('app', $h);
        $instance->addRuntimeLoader(new \Twig\RuntimeLoader\ContainerRuntimeLoader(new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($this->getService, [
            'Symfony\\Bridge\\Twig\\Extension\\CsrfRuntime' => ['privates', 'twig.runtime.security_csrf', 'getTwig_Runtime_SecurityCsrfService.php', true],
            'Symfony\\Bridge\\Twig\\Extension\\HttpKernelRuntime' => ['privates', 'twig.runtime.httpkernel', 'getTwig_Runtime_HttpkernelService.php', true],
            'Symfony\\Component\\Form\\FormRenderer' => ['privates', 'twig.form.renderer', 'getTwig_Form_RendererService.php', true],
        ], [
            'Symfony\\Bridge\\Twig\\Extension\\CsrfRuntime' => '?',
            'Symfony\\Bridge\\Twig\\Extension\\HttpKernelRuntime' => '?',
            'Symfony\\Component\\Form\\FormRenderer' => '?',
        ])));
        (new \Symfony\Bundle\TwigBundle\DependencyInjection\Configurator\EnvironmentConfigurator('F j, Y H:i', '%d days', NULL, 0, '.', ','))->configure($instance);

        return $instance;
    }

    /**
     * Gets the public 'validator' shared service.
     *
     * @return \Symfony\Component\Validator\Validator\TraceableValidator
     */
    protected function getValidatorService()
    {
        return $this->services['validator'] = new \Symfony\Component\Validator\Validator\TraceableValidator(($this->privates['validator.builder'] ?? $this->getValidator_BuilderService())->getValidator());
    }

    /**
     * Gets the public 'var_dumper.cloner' shared service.
     *
     * @return \Symfony\Component\VarDumper\Cloner\VarCloner
     */
    protected function getVarDumper_ClonerService()
    {
        $this->services['var_dumper.cloner'] = $instance = new \Symfony\Component\VarDumper\Cloner\VarCloner();

        $instance->setMaxItems(2500);
        $instance->setMinDepth(1);
        $instance->setMaxString(-1);
        $instance->addCasters(['Closure' => 'Symfony\\Component\\VarDumper\\Caster\\ReflectionCaster::unsetClosureFileInfo']);

        return $instance;
    }

    /**
     * Gets the private 'annotations.cached_reader' shared service.
     *
     * @return \Doctrine\Common\Annotations\CachedReader
     */
    protected function getAnnotations_CachedReaderService()
    {
        return $this->privates['annotations.cached_reader'] = new \Doctrine\Common\Annotations\CachedReader(($this->privates['annotations.reader'] ?? $this->getAnnotations_ReaderService()), $this->load('getAnnotations_CacheService.php'), true);
    }

    /**
     * Gets the private 'annotations.reader' shared service.
     *
     * @return \Doctrine\Common\Annotations\AnnotationReader
     */
    protected function getAnnotations_ReaderService()
    {
        $this->privates['annotations.reader'] = $instance = new \Doctrine\Common\Annotations\AnnotationReader();

        $a = new \Doctrine\Common\Annotations\AnnotationRegistry();
        $a->registerUniqueLoader('class_exists');

        $instance->addGlobalIgnoredName('required', $a);

        return $instance;
    }

    /**
     * Gets the private 'cache.annotations' shared service.
     *
     * @return \Symfony\Component\Cache\Adapter\TraceableAdapter
     */
    protected function getCache_AnnotationsService()
    {
        return $this->privates['cache.annotations'] = new \Symfony\Component\Cache\Adapter\TraceableAdapter(\Symfony\Component\Cache\Adapter\AbstractAdapter::createSystemCache('X1WrewZTK1', 0, $this->getParameter('container.build_id'), ($this->targetDirs[0].'/pools'), ($this->privates['monolog.logger.cache'] ?? $this->getMonolog_Logger_CacheService())));
    }

    /**
     * Gets the private 'cache.easyadmin' shared service.
     *
     * @return \Symfony\Component\Cache\Adapter\TraceableAdapter
     */
    protected function getCache_EasyadminService()
    {
        return $this->privates['cache.easyadmin'] = new \Symfony\Component\Cache\Adapter\TraceableAdapter(\Symfony\Component\Cache\Adapter\AbstractAdapter::createSystemCache('VEuyMhHIO3', 0, $this->getParameter('container.build_id'), ($this->targetDirs[0].'/pools'), ($this->privates['monolog.logger.cache'] ?? $this->getMonolog_Logger_CacheService())));
    }

    /**
     * Gets the private 'cache.messenger.restart_workers_signal' shared service.
     *
     * @return \Symfony\Component\Cache\Adapter\TraceableAdapter
     */
    protected function getCache_Messenger_RestartWorkersSignalService()
    {
        $a = new \Symfony\Component\Cache\Adapter\FilesystemAdapter('VeX3MAVlca', 0, ($this->targetDirs[0].'/pools'), ($this->privates['cache.default_marshaller'] ?? ($this->privates['cache.default_marshaller'] = new \Symfony\Component\Cache\Marshaller\DefaultMarshaller(NULL))));
        $a->setLogger(($this->privates['monolog.logger.cache'] ?? $this->getMonolog_Logger_CacheService()));

        return $this->privates['cache.messenger.restart_workers_signal'] = new \Symfony\Component\Cache\Adapter\TraceableAdapter($a);
    }

    /**
     * Gets the private 'cache.property_info' shared service.
     *
     * @return \Symfony\Component\Cache\Adapter\TraceableAdapter
     */
    protected function getCache_PropertyInfoService()
    {
        return $this->privates['cache.property_info'] = new \Symfony\Component\Cache\Adapter\TraceableAdapter(\Symfony\Component\Cache\Adapter\AbstractAdapter::createSystemCache('elMODyUMwQ', 0, $this->getParameter('container.build_id'), ($this->targetDirs[0].'/pools'), ($this->privates['monolog.logger.cache'] ?? $this->getMonolog_Logger_CacheService())));
    }

    /**
     * Gets the private 'cache.security_expression_language' shared service.
     *
     * @return \Symfony\Component\Cache\Adapter\TraceableAdapter
     */
    protected function getCache_SecurityExpressionLanguageService()
    {
        return $this->privates['cache.security_expression_language'] = new \Symfony\Component\Cache\Adapter\TraceableAdapter(\Symfony\Component\Cache\Adapter\AbstractAdapter::createSystemCache('0-j4UOGnsW', 0, $this->getParameter('container.build_id'), ($this->targetDirs[0].'/pools'), ($this->privates['monolog.logger.cache'] ?? $this->getMonolog_Logger_CacheService())));
    }

    /**
     * Gets the private 'cache.serializer' shared service.
     *
     * @return \Symfony\Component\Cache\Adapter\TraceableAdapter
     */
    protected function getCache_SerializerService()
    {
        return $this->privates['cache.serializer'] = new \Symfony\Component\Cache\Adapter\TraceableAdapter(\Symfony\Component\Cache\Adapter\AbstractAdapter::createSystemCache('e+gpljcPd0', 0, $this->getParameter('container.build_id'), ($this->targetDirs[0].'/pools'), ($this->privates['monolog.logger.cache'] ?? $this->getMonolog_Logger_CacheService())));
    }

    /**
     * Gets the private 'cache.validator' shared service.
     *
     * @return \Symfony\Component\Cache\Adapter\TraceableAdapter
     */
    protected function getCache_ValidatorService()
    {
        return $this->privates['cache.validator'] = new \Symfony\Component\Cache\Adapter\TraceableAdapter(\Symfony\Component\Cache\Adapter\AbstractAdapter::createSystemCache('ZeB0vOEqNc', 0, $this->getParameter('container.build_id'), ($this->targetDirs[0].'/pools'), ($this->privates['monolog.logger.cache'] ?? $this->getMonolog_Logger_CacheService())));
    }

    /**
     * Gets the private 'config_cache_factory' shared service.
     *
     * @return \Symfony\Component\Config\ResourceCheckerConfigCacheFactory
     */
    protected function getConfigCacheFactoryService()
    {
        return $this->privates['config_cache_factory'] = new \Symfony\Component\Config\ResourceCheckerConfigCacheFactory(new RewindableGenerator(function () {
            yield 0 => ($this->privates['dependency_injection.config.container_parameters_resource_checker'] ?? ($this->privates['dependency_injection.config.container_parameters_resource_checker'] = new \Symfony\Component\DependencyInjection\Config\ContainerParametersResourceChecker($this)));
            yield 1 => ($this->privates['config.resource.self_checking_resource_checker'] ?? ($this->privates['config.resource.self_checking_resource_checker'] = new \Symfony\Component\Config\Resource\SelfCheckingResourceChecker()));
        }, 2));
    }

    /**
     * Gets the private 'data_collector.form' shared service.
     *
     * @return \Symfony\Component\Form\Extension\DataCollector\FormDataCollector
     */
    protected function getDataCollector_FormService()
    {
        return $this->privates['data_collector.form'] = new \Symfony\Component\Form\Extension\DataCollector\FormDataCollector(new \Symfony\Component\Form\Extension\DataCollector\FormDataExtractor());
    }

    /**
     * Gets the private 'debug.controller_resolver' shared service.
     *
     * @return \Symfony\Component\HttpKernel\Controller\TraceableControllerResolver
     */
    protected function getDebug_ControllerResolverService()
    {
        return $this->privates['debug.controller_resolver'] = new \Symfony\Component\HttpKernel\Controller\TraceableControllerResolver(new \Symfony\Bundle\FrameworkBundle\Controller\ControllerResolver($this, ($this->privates['controller_name_converter'] ?? ($this->privates['controller_name_converter'] = new \Symfony\Bundle\FrameworkBundle\Controller\ControllerNameParser(($this->services['kernel'] ?? $this->get('kernel', 1))))), ($this->privates['monolog.logger.request'] ?? $this->getMonolog_Logger_RequestService())), ($this->privates['debug.stopwatch'] ?? ($this->privates['debug.stopwatch'] = new \Symfony\Component\Stopwatch\Stopwatch(true))));
    }

    /**
     * Gets the private 'debug.debug_handlers_listener' shared service.
     *
     * @return \Symfony\Component\HttpKernel\EventListener\DebugHandlersListener
     */
    protected function getDebug_DebugHandlersListenerService()
    {
        $a = new \Symfony\Bridge\Monolog\Logger('php');
        $a->pushProcessor(($this->privates['debug.log_processor'] ?? $this->getDebug_LogProcessorService()));
        $a->pushHandler(($this->privates['monolog.handler.console'] ?? $this->getMonolog_Handler_ConsoleService()));
        $a->pushHandler(($this->privates['monolog.handler.main'] ?? $this->getMonolog_Handler_MainService()));
        \Symfony\Bundle\FrameworkBundle\DependencyInjection\Compiler\AddDebugLogProcessorPass::configureLogger($a);

        return $this->privates['debug.debug_handlers_listener'] = new \Symfony\Component\HttpKernel\EventListener\DebugHandlersListener(NULL, $a, NULL, -1, true, ($this->privates['debug.file_link_formatter'] ?? $this->getDebug_FileLinkFormatterService()), true, 'UTF-8');
    }

    /**
     * Gets the private 'debug.file_link_formatter' shared service.
     *
     * @return \Symfony\Component\HttpKernel\Debug\FileLinkFormatter
     */
    protected function getDebug_FileLinkFormatterService()
    {
        return $this->privates['debug.file_link_formatter'] = new \Symfony\Component\HttpKernel\Debug\FileLinkFormatter(NULL, ($this->services['request_stack'] ?? ($this->services['request_stack'] = new \Symfony\Component\HttpFoundation\RequestStack())), $this->targetDirs[3], function () {
            return ($this->privates['debug.file_link_formatter.url_format'] ?? $this->load('getDebug_FileLinkFormatter_UrlFormatService.php'));
        });
    }

    /**
     * Gets the private 'debug.log_processor' shared service.
     *
     * @return \Symfony\Bridge\Monolog\Processor\DebugProcessor
     */
    protected function getDebug_LogProcessorService()
    {
        return $this->privates['debug.log_processor'] = new \Symfony\Bridge\Monolog\Processor\DebugProcessor(($this->services['request_stack'] ?? ($this->services['request_stack'] = new \Symfony\Component\HttpFoundation\RequestStack())));
    }

    /**
     * Gets the private 'debug.security.access.decision_manager' shared service.
     *
     * @return \Symfony\Component\Security\Core\Authorization\TraceableAccessDecisionManager
     */
    protected function getDebug_Security_Access_DecisionManagerService()
    {
        return $this->privates['debug.security.access.decision_manager'] = new \Symfony\Component\Security\Core\Authorization\TraceableAccessDecisionManager(new \Symfony\Component\Security\Core\Authorization\AccessDecisionManager(new RewindableGenerator(function () {
            yield 0 => ($this->privates['debug.security.voter.security.access.authenticated_voter'] ?? $this->load('getDebug_Security_Voter_Security_Access_AuthenticatedVoterService.php'));
            yield 1 => ($this->privates['debug.security.voter.security.access.role_hierarchy_voter'] ?? $this->load('getDebug_Security_Voter_Security_Access_RoleHierarchyVoterService.php'));
            yield 2 => ($this->privates['debug.security.voter.security.access.expression_voter'] ?? $this->load('getDebug_Security_Voter_Security_Access_ExpressionVoterService.php'));
        }, 3), 'affirmative', false, true));
    }

    /**
     * Gets the private 'debug.security.firewall' shared service.
     *
     * @return \Symfony\Bundle\SecurityBundle\Debug\TraceableFirewallListener
     */
    protected function getDebug_Security_FirewallService()
    {
        return $this->privates['debug.security.firewall'] = new \Symfony\Bundle\SecurityBundle\Debug\TraceableFirewallListener(($this->privates['security.firewall.map'] ?? $this->getSecurity_Firewall_MapService()), ($this->services['event_dispatcher'] ?? $this->getEventDispatcherService()), ($this->privates['security.logout_url_generator'] ?? $this->getSecurity_LogoutUrlGeneratorService()));
    }

    /**
     * Gets the private 'form.registry' shared service.
     *
     * @return \Symfony\Component\Form\FormRegistry
     */
    protected function getForm_RegistryService()
    {
        return $this->privates['form.registry'] = new \Symfony\Component\Form\FormRegistry([0 => new \Symfony\Component\Form\Extension\DependencyInjection\DependencyInjectionExtension(new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($this->getService, [
            'easyadmin.filter.type.array' => ['privates', 'easyadmin.filter.type.array', 'getEasyadmin_Filter_Type_ArrayService.php', true],
            'easyadmin.filter.type.boolean' => ['privates', 'easyadmin.filter.type.boolean', 'getEasyadmin_Filter_Type_BooleanService.php', true],
            'easyadmin.filter.type.choice' => ['privates', 'easyadmin.filter.type.choice', 'getEasyadmin_Filter_Type_ChoiceService.php', true],
            'easyadmin.filter.type.comparison' => ['privates', 'easyadmin.filter.type.comparison', 'getEasyadmin_Filter_Type_ComparisonService.php', true],
            'easyadmin.filter.type.date' => ['privates', 'easyadmin.filter.type.date', 'getEasyadmin_Filter_Type_DateService.php', true],
            'easyadmin.filter.type.dateinterval' => ['privates', 'easyadmin.filter.type.dateinterval', 'getEasyadmin_Filter_Type_DateintervalService.php', true],
            'easyadmin.filter.type.datetime' => ['privates', 'easyadmin.filter.type.datetime', 'getEasyadmin_Filter_Type_DatetimeService.php', true],
            'easyadmin.filter.type.decimal' => ['privates', 'easyadmin.filter.type.decimal', 'getEasyadmin_Filter_Type_DecimalService.php', true],
            'easyadmin.filter.type.entity' => ['privates', 'easyadmin.filter.type.entity', 'getEasyadmin_Filter_Type_EntityService.php', true],
            'easyadmin.filter.type.float' => ['privates', 'easyadmin.filter.type.float', 'getEasyadmin_Filter_Type_FloatService.php', true],
            'easyadmin.filter.type.integer' => ['privates', 'easyadmin.filter.type.integer', 'getEasyadmin_Filter_Type_IntegerService.php', true],
            'easyadmin.filter.type.text' => ['privates', 'easyadmin.filter.type.text', 'getEasyadmin_Filter_Type_TextService.php', true],
            'easyadmin.filter.type.textarea' => ['privates', 'easyadmin.filter.type.textarea', 'getEasyadmin_Filter_Type_TextareaService.php', true],
            'easyadmin.filter.type.time' => ['privates', 'easyadmin.filter.type.time', 'getEasyadmin_Filter_Type_TimeService.php', true],
        ], [
            'easyadmin.filter.type.array' => '?',
            'easyadmin.filter.type.boolean' => '?',
            'easyadmin.filter.type.choice' => '?',
            'easyadmin.filter.type.comparison' => '?',
            'easyadmin.filter.type.date' => '?',
            'easyadmin.filter.type.dateinterval' => '?',
            'easyadmin.filter.type.datetime' => '?',
            'easyadmin.filter.type.decimal' => '?',
            'easyadmin.filter.type.entity' => '?',
            'easyadmin.filter.type.float' => '?',
            'easyadmin.filter.type.integer' => '?',
            'easyadmin.filter.type.text' => '?',
            'easyadmin.filter.type.textarea' => '?',
            'easyadmin.filter.type.time' => '?',
        ]), [], new RewindableGenerator(function () {
            return new \EmptyIterator();
        }, 0)), 1 => new \Symfony\Component\Form\Extension\DependencyInjection\DependencyInjectionExtension(new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($this->getService, [
            'App\\Form\\ContactType' => ['privates', 'App\\Form\\ContactType', 'getContactTypeService.php', true],
            'App\\Form\\LunettesType' => ['privates', 'App\\Form\\LunettesType', 'getLunettesTypeService.php', true],
            'App\\Form\\MarqueType' => ['privates', 'App\\Form\\MarqueType', 'getMarqueTypeService.php', true],
            'App\\Form\\RegistrationType' => ['privates', 'App\\Form\\RegistrationType', 'getRegistrationTypeService.php', true],
            'App\\Form\\ResetEmailType' => ['privates', 'App\\Form\\ResetEmailType', 'getResetEmailTypeService.php', true],
            'App\\Form\\ResetInfoType' => ['privates', 'App\\Form\\ResetInfoType', 'getResetInfoTypeService.php', true],
            'App\\Form\\ResetPasswordType' => ['privates', 'App\\Form\\ResetPasswordType', 'getResetPasswordTypeService.php', true],
            'EasyCorp\\Bundle\\EasyAdminBundle\\Form\\Type\\EasyAdminAutocompleteType' => ['privates', 'easyadmin.form.type.autocomplete', 'getEasyadmin_Form_Type_AutocompleteService.php', true],
            'EasyCorp\\Bundle\\EasyAdminBundle\\Form\\Type\\EasyAdminBatchFormType' => ['privates', 'easyadmin.form.type.batch', 'getEasyadmin_Form_Type_BatchService.php', true],
            'EasyCorp\\Bundle\\EasyAdminBundle\\Form\\Type\\EasyAdminDividerType' => ['privates', 'easyadmin.form.type.divider', 'getEasyadmin_Form_Type_DividerService.php', true],
            'EasyCorp\\Bundle\\EasyAdminBundle\\Form\\Type\\EasyAdminFiltersFormType' => ['privates', 'easyadmin.form.type.filters', 'getEasyadmin_Form_Type_FiltersService.php', true],
            'EasyCorp\\Bundle\\EasyAdminBundle\\Form\\Type\\EasyAdminFormType' => ['privates', 'easyadmin.form.type', 'getEasyadmin_Form_TypeService.php', true],
            'EasyCorp\\Bundle\\EasyAdminBundle\\Form\\Type\\EasyAdminGroupType' => ['privates', 'easyadmin.form.type.group', 'getEasyadmin_Form_Type_GroupService.php', true],
            'EasyCorp\\Bundle\\EasyAdminBundle\\Form\\Type\\EasyAdminSectionType' => ['privates', 'easyadmin.form.type.section', 'getEasyadmin_Form_Type_SectionService.php', true],
            'EasyCorp\\Bundle\\EasyAdminBundle\\Form\\Type\\FileUploadType' => ['privates', 'easyadmin.form.type.fileupload', 'getEasyadmin_Form_Type_FileuploadService.php', true],
            'Liip\\ImagineBundle\\Form\\Type\\ImageType' => ['privates', 'liip_imagine.form.type.image', 'getLiipImagine_Form_Type_ImageService.php', true],
            'Symfony\\Bridge\\Doctrine\\Form\\Type\\EntityType' => ['privates', 'form.type.entity', 'getForm_Type_EntityService.php', true],
            'Symfony\\Component\\Form\\Extension\\Core\\Type\\ChoiceType' => ['privates', 'form.type.choice', 'getForm_Type_ChoiceService.php', true],
            'Symfony\\Component\\Form\\Extension\\Core\\Type\\FileType' => ['services', 'form.type.file', 'getForm_Type_FileService.php', true],
            'Symfony\\Component\\Form\\Extension\\Core\\Type\\FormType' => ['privates', 'form.type.form', 'getForm_Type_FormService.php', true],
        ], [
            'App\\Form\\ContactType' => '?',
            'App\\Form\\LunettesType' => '?',
            'App\\Form\\MarqueType' => '?',
            'App\\Form\\RegistrationType' => '?',
            'App\\Form\\ResetEmailType' => '?',
            'App\\Form\\ResetInfoType' => '?',
            'App\\Form\\ResetPasswordType' => '?',
            'EasyCorp\\Bundle\\EasyAdminBundle\\Form\\Type\\EasyAdminAutocompleteType' => '?',
            'EasyCorp\\Bundle\\EasyAdminBundle\\Form\\Type\\EasyAdminBatchFormType' => '?',
            'EasyCorp\\Bundle\\EasyAdminBundle\\Form\\Type\\EasyAdminDividerType' => '?',
            'EasyCorp\\Bundle\\EasyAdminBundle\\Form\\Type\\EasyAdminFiltersFormType' => '?',
            'EasyCorp\\Bundle\\EasyAdminBundle\\Form\\Type\\EasyAdminFormType' => '?',
            'EasyCorp\\Bundle\\EasyAdminBundle\\Form\\Type\\EasyAdminGroupType' => '?',
            'EasyCorp\\Bundle\\EasyAdminBundle\\Form\\Type\\EasyAdminSectionType' => '?',
            'EasyCorp\\Bundle\\EasyAdminBundle\\Form\\Type\\FileUploadType' => '?',
            'Liip\\ImagineBundle\\Form\\Type\\ImageType' => '?',
            'Symfony\\Bridge\\Doctrine\\Form\\Type\\EntityType' => '?',
            'Symfony\\Component\\Form\\Extension\\Core\\Type\\ChoiceType' => '?',
            'Symfony\\Component\\Form\\Extension\\Core\\Type\\FileType' => '?',
            'Symfony\\Component\\Form\\Extension\\Core\\Type\\FormType' => '?',
        ]), ['Symfony\\Component\\Form\\Extension\\Core\\Type\\FormType' => new RewindableGenerator(function () {
            yield 0 => ($this->privates['form.type_extension.form.transformation_failure_handling'] ?? $this->load('getForm_TypeExtension_Form_TransformationFailureHandlingService.php'));
            yield 1 => ($this->privates['form.type_extension.form.http_foundation'] ?? $this->load('getForm_TypeExtension_Form_HttpFoundationService.php'));
            yield 2 => ($this->privates['form.type_extension.form.validator'] ?? $this->load('getForm_TypeExtension_Form_ValidatorService.php'));
            yield 3 => ($this->privates['form.type_extension.upload.validator'] ?? $this->load('getForm_TypeExtension_Upload_ValidatorService.php'));
            yield 4 => ($this->privates['form.type_extension.csrf'] ?? $this->load('getForm_TypeExtension_CsrfService.php'));
            yield 5 => ($this->privates['form.type_extension.form.data_collector'] ?? $this->load('getForm_TypeExtension_Form_DataCollectorService.php'));
            yield 6 => ($this->privates['easyadmin.form.type.extension'] ?? $this->load('getEasyadmin_Form_Type_ExtensionService.php'));
        }, 7), 'Symfony\\Component\\Form\\Extension\\Core\\Type\\RepeatedType' => new RewindableGenerator(function () {
            yield 0 => ($this->privates['form.type_extension.repeated.validator'] ?? ($this->privates['form.type_extension.repeated.validator'] = new \Symfony\Component\Form\Extension\Validator\Type\RepeatedTypeValidatorExtension()));
        }, 1), 'Symfony\\Component\\Form\\Extension\\Core\\Type\\SubmitType' => new RewindableGenerator(function () {
            yield 0 => ($this->privates['form.type_extension.submit.validator'] ?? ($this->privates['form.type_extension.submit.validator'] = new \Symfony\Component\Form\Extension\Validator\Type\SubmitTypeValidatorExtension()));
        }, 1)], new RewindableGenerator(function () {
            yield 0 => ($this->privates['form.type_guesser.validator'] ?? $this->load('getForm_TypeGuesser_ValidatorService.php'));
            yield 1 => ($this->privates['form.type_guesser.doctrine'] ?? $this->load('getForm_TypeGuesser_DoctrineService.php'));
            yield 2 => ($this->services['easyadmin.form.guesser.missing_doctrine_orm_type_guesser'] ?? $this->load('getEasyadmin_Form_Guesser_MissingDoctrineOrmTypeGuesserService.php'));
        }, 3))], new \Symfony\Component\Form\Extension\DataCollector\Proxy\ResolvedTypeFactoryDataCollectorProxy(new \Symfony\Component\Form\ResolvedFormTypeFactory(), ($this->privates['data_collector.form'] ?? $this->getDataCollector_FormService())));
    }

    /**
     * Gets the private 'framework_extra_bundle.argument_name_convertor' shared service.
     *
     * @return \Sensio\Bundle\FrameworkExtraBundle\Request\ArgumentNameConverter
     */
    protected function getFrameworkExtraBundle_ArgumentNameConvertorService()
    {
        return $this->privates['framework_extra_bundle.argument_name_convertor'] = new \Sensio\Bundle\FrameworkExtraBundle\Request\ArgumentNameConverter(($this->privates['argument_metadata_factory'] ?? ($this->privates['argument_metadata_factory'] = new \Symfony\Component\HttpKernel\ControllerMetadata\ArgumentMetadataFactory())));
    }

    /**
     * Gets the private 'framework_extra_bundle.event.is_granted' shared service.
     *
     * @return \Sensio\Bundle\FrameworkExtraBundle\EventListener\IsGrantedListener
     */
    protected function getFrameworkExtraBundle_Event_IsGrantedService()
    {
        return $this->privates['framework_extra_bundle.event.is_granted'] = new \Sensio\Bundle\FrameworkExtraBundle\EventListener\IsGrantedListener(($this->privates['framework_extra_bundle.argument_name_convertor'] ?? $this->getFrameworkExtraBundle_ArgumentNameConvertorService()), ($this->services['security.authorization_checker'] ?? $this->getSecurity_AuthorizationCheckerService()));
    }

    /**
     * Gets the private 'knp_paginator.subscriber.sliding_pagination' shared service.
     *
     * @return \Knp\Bundle\PaginatorBundle\Subscriber\SlidingPaginationSubscriber
     */
    protected function getKnpPaginator_Subscriber_SlidingPaginationService()
    {
        return $this->privates['knp_paginator.subscriber.sliding_pagination'] = new \Knp\Bundle\PaginatorBundle\Subscriber\SlidingPaginationSubscriber(['defaultPaginationTemplate' => '@KnpPaginator/Pagination/twitter_bootstrap_v4_pagination.html.twig', 'defaultSortableTemplate' => 'KnpPaginator/Pagination/twitter_bootstrap_v4_sortable_link.html.twig', 'defaultFiltrationTemplate' => '@KnpPaginator/Pagination/filtration.html.twig', 'defaultPageRange' => 5]);
    }

    /**
     * Gets the private 'liip_imagine.filter.configuration' shared service.
     *
     * @return \Liip\ImagineBundle\Imagine\Filter\FilterConfiguration
     */
    protected function getLiipImagine_Filter_ConfigurationService()
    {
        return $this->privates['liip_imagine.filter.configuration'] = new \Liip\ImagineBundle\Imagine\Filter\FilterConfiguration($this->parameters['liip_imagine.filter_sets']);
    }

    /**
     * Gets the private 'locale_aware_listener' shared service.
     *
     * @return \Symfony\Component\HttpKernel\EventListener\LocaleAwareListener
     */
    protected function getLocaleAwareListenerService()
    {
        return $this->privates['locale_aware_listener'] = new \Symfony\Component\HttpKernel\EventListener\LocaleAwareListener(new RewindableGenerator(function () {
            yield 0 => ($this->privates['translator.default'] ?? $this->getTranslator_DefaultService());
        }, 1), ($this->services['request_stack'] ?? ($this->services['request_stack'] = new \Symfony\Component\HttpFoundation\RequestStack())));
    }

    /**
     * Gets the private 'locale_listener' shared service.
     *
     * @return \Symfony\Component\HttpKernel\EventListener\LocaleListener
     */
    protected function getLocaleListenerService()
    {
        return $this->privates['locale_listener'] = new \Symfony\Component\HttpKernel\EventListener\LocaleListener(($this->services['request_stack'] ?? ($this->services['request_stack'] = new \Symfony\Component\HttpFoundation\RequestStack())), 'fr', ($this->services['router'] ?? $this->getRouterService()));
    }

    /**
     * Gets the private 'monolog.handler.console' shared service.
     *
     * @return \Symfony\Bridge\Monolog\Handler\ConsoleHandler
     */
    protected function getMonolog_Handler_ConsoleService()
    {
        return $this->privates['monolog.handler.console'] = new \Symfony\Bridge\Monolog\Handler\ConsoleHandler(NULL, true, [], []);
    }

    /**
     * Gets the private 'monolog.handler.main' shared service.
     *
     * @return \Monolog\Handler\StreamHandler
     */
    protected function getMonolog_Handler_MainService()
    {
        $this->privates['monolog.handler.main'] = $instance = new \Monolog\Handler\StreamHandler(($this->targetDirs[2].'\\log/dev.log'), 100, true, NULL, false);

        $instance->pushProcessor(new \Monolog\Processor\PsrLogMessageProcessor());

        return $instance;
    }

    /**
     * Gets the private 'monolog.logger' shared service.
     *
     * @return \Symfony\Bridge\Monolog\Logger
     */
    protected function getMonolog_LoggerService()
    {
        $this->privates['monolog.logger'] = $instance = new \Symfony\Bridge\Monolog\Logger('app');

        $instance->pushProcessor(($this->privates['debug.log_processor'] ?? $this->getDebug_LogProcessorService()));
        $instance->useMicrosecondTimestamps(true);
        $instance->pushHandler(($this->privates['monolog.handler.console'] ?? $this->getMonolog_Handler_ConsoleService()));
        $instance->pushHandler(($this->privates['monolog.handler.main'] ?? $this->getMonolog_Handler_MainService()));
        \Symfony\Bundle\FrameworkBundle\DependencyInjection\Compiler\AddDebugLogProcessorPass::configureLogger($instance);

        return $instance;
    }

    /**
     * Gets the private 'monolog.logger.cache' shared service.
     *
     * @return \Symfony\Bridge\Monolog\Logger
     */
    protected function getMonolog_Logger_CacheService()
    {
        $this->privates['monolog.logger.cache'] = $instance = new \Symfony\Bridge\Monolog\Logger('cache');

        $instance->pushProcessor(($this->privates['debug.log_processor'] ?? $this->getDebug_LogProcessorService()));
        $instance->pushHandler(($this->privates['monolog.handler.console'] ?? $this->getMonolog_Handler_ConsoleService()));
        $instance->pushHandler(($this->privates['monolog.handler.main'] ?? $this->getMonolog_Handler_MainService()));
        \Symfony\Bundle\FrameworkBundle\DependencyInjection\Compiler\AddDebugLogProcessorPass::configureLogger($instance);

        return $instance;
    }

    /**
     * Gets the private 'monolog.logger.request' shared service.
     *
     * @return \Symfony\Bridge\Monolog\Logger
     */
    protected function getMonolog_Logger_RequestService()
    {
        $this->privates['monolog.logger.request'] = $instance = new \Symfony\Bridge\Monolog\Logger('request');

        $instance->pushProcessor(($this->privates['debug.log_processor'] ?? $this->getDebug_LogProcessorService()));
        $instance->pushHandler(($this->privates['monolog.handler.console'] ?? $this->getMonolog_Handler_ConsoleService()));
        $instance->pushHandler(($this->privates['monolog.handler.main'] ?? $this->getMonolog_Handler_MainService()));
        \Symfony\Bundle\FrameworkBundle\DependencyInjection\Compiler\AddDebugLogProcessorPass::configureLogger($instance);

        return $instance;
    }

    /**
     * Gets the private 'parameter_bag' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ParameterBag\ContainerBag
     */
    protected function getParameterBagService()
    {
        return $this->privates['parameter_bag'] = new \Symfony\Component\DependencyInjection\ParameterBag\ContainerBag($this);
    }

    /**
     * Gets the private 'profiler_listener' shared service.
     *
     * @return \Symfony\Component\HttpKernel\EventListener\ProfilerListener
     */
    protected function getProfilerListenerService()
    {
        return $this->privates['profiler_listener'] = new \Symfony\Component\HttpKernel\EventListener\ProfilerListener(($this->services['profiler'] ?? $this->getProfilerService()), ($this->services['request_stack'] ?? ($this->services['request_stack'] = new \Symfony\Component\HttpFoundation\RequestStack())), NULL, false, false);
    }

    /**
     * Gets the private 'resolve_controller_name_subscriber' shared service.
     *
     * @return \Symfony\Bundle\FrameworkBundle\EventListener\ResolveControllerNameSubscriber
     */
    protected function getResolveControllerNameSubscriberService()
    {
        return $this->privates['resolve_controller_name_subscriber'] = new \Symfony\Bundle\FrameworkBundle\EventListener\ResolveControllerNameSubscriber(($this->privates['controller_name_converter'] ?? ($this->privates['controller_name_converter'] = new \Symfony\Bundle\FrameworkBundle\Controller\ControllerNameParser(($this->services['kernel'] ?? $this->get('kernel', 1))))));
    }

    /**
     * Gets the private 'router.request_context' shared service.
     *
     * @return \Symfony\Component\Routing\RequestContext
     */
    protected function getRouter_RequestContextService()
    {
        return $this->privates['router.request_context'] = new \Symfony\Component\Routing\RequestContext('', 'GET', 'localhost', 'http', 80, 443);
    }

    /**
     * Gets the private 'router_listener' shared service.
     *
     * @return \Symfony\Component\HttpKernel\EventListener\RouterListener
     */
    protected function getRouterListenerService()
    {
        return $this->privates['router_listener'] = new \Symfony\Component\HttpKernel\EventListener\RouterListener(($this->services['router'] ?? $this->getRouterService()), ($this->services['request_stack'] ?? ($this->services['request_stack'] = new \Symfony\Component\HttpFoundation\RequestStack())), ($this->privates['router.request_context'] ?? $this->getRouter_RequestContextService()), ($this->privates['monolog.logger.request'] ?? $this->getMonolog_Logger_RequestService()), $this->targetDirs[3], true);
    }

    /**
     * Gets the private 'security.authentication.manager' shared service.
     *
     * @return \Symfony\Component\Security\Core\Authentication\AuthenticationProviderManager
     */
    protected function getSecurity_Authentication_ManagerService()
    {
        $this->privates['security.authentication.manager'] = $instance = new \Symfony\Component\Security\Core\Authentication\AuthenticationProviderManager(new RewindableGenerator(function () {
            yield 0 => ($this->privates['security.authentication.provider.dao.main'] ?? $this->load('getSecurity_Authentication_Provider_Dao_MainService.php'));
            yield 1 => ($this->privates['security.authentication.provider.anonymous.main'] ?? ($this->privates['security.authentication.provider.anonymous.main'] = new \Symfony\Component\Security\Core\Authentication\Provider\AnonymousAuthenticationProvider($this->getParameter('container.build_hash'))));
        }, 2), true);

        $instance->setEventDispatcher(($this->services['event_dispatcher'] ?? $this->getEventDispatcherService()));

        return $instance;
    }

    /**
     * Gets the private 'security.firewall.map' shared service.
     *
     * @return \Symfony\Bundle\SecurityBundle\Security\FirewallMap
     */
    protected function getSecurity_Firewall_MapService()
    {
        return $this->privates['security.firewall.map'] = new \Symfony\Bundle\SecurityBundle\Security\FirewallMap(new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($this->getService, [
            'security.firewall.map.context.dev' => ['privates', 'security.firewall.map.context.dev', 'getSecurity_Firewall_Map_Context_DevService.php', true],
            'security.firewall.map.context.main' => ['privates', 'security.firewall.map.context.main', 'getSecurity_Firewall_Map_Context_MainService.php', true],
        ], [
            'security.firewall.map.context.dev' => '?',
            'security.firewall.map.context.main' => '?',
        ]), new RewindableGenerator(function () {
            yield 'security.firewall.map.context.dev' => ($this->privates['.security.request_matcher.Iy.T22O'] ?? ($this->privates['.security.request_matcher.Iy.T22O'] = new \Symfony\Component\HttpFoundation\RequestMatcher('^/(_(profiler|wdt)|css|images|js)/')));
            yield 'security.firewall.map.context.main' => NULL;
        }, 2));
    }

    /**
     * Gets the private 'security.logout_url_generator' shared service.
     *
     * @return \Symfony\Component\Security\Http\Logout\LogoutUrlGenerator
     */
    protected function getSecurity_LogoutUrlGeneratorService()
    {
        $this->privates['security.logout_url_generator'] = $instance = new \Symfony\Component\Security\Http\Logout\LogoutUrlGenerator(($this->services['request_stack'] ?? ($this->services['request_stack'] = new \Symfony\Component\HttpFoundation\RequestStack())), ($this->services['router'] ?? $this->getRouterService()), ($this->services['security.token_storage'] ?? ($this->services['security.token_storage'] = new \Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage())));

        $instance->registerListener('main', 'security_logout', 'logout', '_csrf_token', NULL, NULL);

        return $instance;
    }

    /**
     * Gets the private 'security.role_hierarchy' shared service.
     *
     * @return \Symfony\Component\Security\Core\Role\RoleHierarchy
     */
    protected function getSecurity_RoleHierarchyService()
    {
        return $this->privates['security.role_hierarchy'] = new \Symfony\Component\Security\Core\Role\RoleHierarchy($this->parameters['security.role_hierarchy.roles']);
    }

    /**
     * Gets the private 'sensio_framework_extra.controller.listener' shared service.
     *
     * @return \Sensio\Bundle\FrameworkExtraBundle\EventListener\ControllerListener
     */
    protected function getSensioFrameworkExtra_Controller_ListenerService()
    {
        return $this->privates['sensio_framework_extra.controller.listener'] = new \Sensio\Bundle\FrameworkExtraBundle\EventListener\ControllerListener(($this->privates['annotations.cached_reader'] ?? $this->getAnnotations_CachedReaderService()));
    }

    /**
     * Gets the private 'sensio_framework_extra.converter.listener' shared service.
     *
     * @return \Sensio\Bundle\FrameworkExtraBundle\EventListener\ParamConverterListener
     */
    protected function getSensioFrameworkExtra_Converter_ListenerService()
    {
        $a = new \Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\ParamConverterManager();
        $a->add(new \Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\DoctrineParamConverter(($this->services['doctrine'] ?? $this->getDoctrineService()), new \Symfony\Component\ExpressionLanguage\ExpressionLanguage()), 0, 'doctrine.orm');
        $a->add(new \Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\DateTimeParamConverter(), 0, 'datetime');

        return $this->privates['sensio_framework_extra.converter.listener'] = new \Sensio\Bundle\FrameworkExtraBundle\EventListener\ParamConverterListener($a, true);
    }

    /**
     * Gets the private 'sensio_framework_extra.security.listener' shared service.
     *
     * @return \Sensio\Bundle\FrameworkExtraBundle\EventListener\SecurityListener
     */
    protected function getSensioFrameworkExtra_Security_ListenerService()
    {
        return $this->privates['sensio_framework_extra.security.listener'] = new \Sensio\Bundle\FrameworkExtraBundle\EventListener\SecurityListener(($this->privates['framework_extra_bundle.argument_name_convertor'] ?? $this->getFrameworkExtraBundle_ArgumentNameConvertorService()), new \Sensio\Bundle\FrameworkExtraBundle\Security\ExpressionLanguage(), ($this->privates['security.authentication.trust_resolver'] ?? ($this->privates['security.authentication.trust_resolver'] = new \Symfony\Component\Security\Core\Authentication\AuthenticationTrustResolver(NULL, NULL))), ($this->privates['security.role_hierarchy'] ?? $this->getSecurity_RoleHierarchyService()), ($this->services['security.token_storage'] ?? ($this->services['security.token_storage'] = new \Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage())), ($this->services['security.authorization_checker'] ?? $this->getSecurity_AuthorizationCheckerService()), ($this->privates['monolog.logger'] ?? $this->getMonolog_LoggerService()));
    }

    /**
     * Gets the private 'sensio_framework_extra.view.listener' shared service.
     *
     * @return \Sensio\Bundle\FrameworkExtraBundle\EventListener\TemplateListener
     */
    protected function getSensioFrameworkExtra_View_ListenerService()
    {
        return $this->privates['sensio_framework_extra.view.listener'] = new \Sensio\Bundle\FrameworkExtraBundle\EventListener\TemplateListener(new \Sensio\Bundle\FrameworkExtraBundle\Templating\TemplateGuesser(($this->services['kernel'] ?? $this->get('kernel', 1))), ($this->services['twig'] ?? $this->getTwigService()));
    }

    /**
     * Gets the private 'session_listener' shared service.
     *
     * @return \Symfony\Component\HttpKernel\EventListener\SessionListener
     */
    protected function getSessionListenerService()
    {
        return $this->privates['session_listener'] = new \Symfony\Component\HttpKernel\EventListener\SessionListener(new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($this->getService, [
            'initialized_session' => ['services', 'session', NULL, true],
            'request_stack' => ['services', 'request_stack', 'getRequestStackService', false],
            'session' => ['services', 'session', 'getSessionService.php', true],
            'session_storage' => ['privates', 'session.storage.native', 'getSession_Storage_NativeService.php', true],
        ], [
            'initialized_session' => '?',
            'request_stack' => '?',
            'session' => '?',
            'session_storage' => '?',
        ]));
    }

    /**
     * Gets the private 'translator.default' shared service.
     *
     * @return \Symfony\Bundle\FrameworkBundle\Translation\Translator
     */
    protected function getTranslator_DefaultService()
    {
        $this->privates['translator.default'] = $instance = new \Symfony\Bundle\FrameworkBundle\Translation\Translator(new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($this->getService, [
            'translation.loader.csv' => ['privates', 'translation.loader.csv', 'getTranslation_Loader_CsvService.php', true],
            'translation.loader.dat' => ['privates', 'translation.loader.dat', 'getTranslation_Loader_DatService.php', true],
            'translation.loader.ini' => ['privates', 'translation.loader.ini', 'getTranslation_Loader_IniService.php', true],
            'translation.loader.json' => ['privates', 'translation.loader.json', 'getTranslation_Loader_JsonService.php', true],
            'translation.loader.mo' => ['privates', 'translation.loader.mo', 'getTranslation_Loader_MoService.php', true],
            'translation.loader.php' => ['privates', 'translation.loader.php', 'getTranslation_Loader_PhpService.php', true],
            'translation.loader.po' => ['privates', 'translation.loader.po', 'getTranslation_Loader_PoService.php', true],
            'translation.loader.qt' => ['privates', 'translation.loader.qt', 'getTranslation_Loader_QtService.php', true],
            'translation.loader.res' => ['privates', 'translation.loader.res', 'getTranslation_Loader_ResService.php', true],
            'translation.loader.xliff' => ['privates', 'translation.loader.xliff', 'getTranslation_Loader_XliffService.php', true],
            'translation.loader.yml' => ['privates', 'translation.loader.yml', 'getTranslation_Loader_YmlService.php', true],
        ], [
            'translation.loader.csv' => '?',
            'translation.loader.dat' => '?',
            'translation.loader.ini' => '?',
            'translation.loader.json' => '?',
            'translation.loader.mo' => '?',
            'translation.loader.php' => '?',
            'translation.loader.po' => '?',
            'translation.loader.qt' => '?',
            'translation.loader.res' => '?',
            'translation.loader.xliff' => '?',
            'translation.loader.yml' => '?',
        ]), new \Symfony\Component\Translation\Formatter\MessageFormatter(new \Symfony\Component\Translation\IdentityTranslator()), 'fr', ['translation.loader.php' => [0 => 'php'], 'translation.loader.yml' => [0 => 'yaml', 1 => 'yml'], 'translation.loader.xliff' => [0 => 'xlf', 1 => 'xliff'], 'translation.loader.po' => [0 => 'po'], 'translation.loader.mo' => [0 => 'mo'], 'translation.loader.qt' => [0 => 'ts'], 'translation.loader.csv' => [0 => 'csv'], 'translation.loader.res' => [0 => 'res'], 'translation.loader.dat' => [0 => 'dat'], 'translation.loader.ini' => [0 => 'ini'], 'translation.loader.json' => [0 => 'json']], ['cache_dir' => ($this->targetDirs[0].'/translations'), 'debug' => true, 'resource_files' => ['af' => [0 => ($this->targetDirs[3].'\\vendor\\symfony\\validator/Resources/translations\\validators.af.xlf')], 'ar' => [0 => ($this->targetDirs[3].'\\vendor\\symfony\\validator/Resources/translations\\validators.ar.xlf'), 1 => ($this->targetDirs[3].'\\vendor\\symfony\\form/Resources/translations\\validators.ar.xlf'), 2 => ($this->targetDirs[3].'\\vendor\\symfony\\security-core/Resources/translations\\security.ar.xlf'), 3 => ($this->targetDirs[3].'\\vendor\\easycorp\\easyadmin-bundle\\src/Resources/translations\\EasyAdminBundle.ar.xlf'), 4 => ($this->targetDirs[3].'\\vendor\\easycorp\\easyadmin-bundle\\src/Resources/translations\\messages.ar.xlf'), 5 => ($this->targetDirs[3].'\\vendor\\knplabs\\knp-paginator-bundle/Resources/translations\\KnpPaginatorBundle.ar.xliff')], 'az' => [0 => ($this->targetDirs[3].'\\vendor\\symfony\\validator/Resources/translations\\validators.az.xlf'), 1 => ($this->targetDirs[3].'\\vendor\\symfony\\form/Resources/translations\\validators.az.xlf'), 2 => ($this->targetDirs[3].'\\vendor\\symfony\\security-core/Resources/translations\\security.az.xlf')], 'be' => [0 => ($this->targetDirs[3].'\\vendor\\symfony\\validator/Resources/translations\\validators.be.xlf'), 1 => ($this->targetDirs[3].'\\vendor\\symfony\\form/Resources/translations\\validators.be.xlf'), 2 => ($this->targetDirs[3].'\\vendor\\symfony\\security-core/Resources/translations\\security.be.xlf')], 'bg' => [0 => ($this->targetDirs[3].'\\vendor\\symfony\\validator/Resources/translations\\validators.bg.xlf'), 1 => ($this->targetDirs[3].'\\vendor\\symfony\\form/Resources/translations\\validators.bg.xlf'), 2 => ($this->targetDirs[3].'\\vendor\\symfony\\security-core/Resources/translations\\security.bg.xlf'), 3 => ($this->targetDirs[3].'\\vendor\\easycorp\\easyadmin-bundle\\src/Resources/translations\\EasyAdminBundle.bg.xlf'), 4 => ($this->targetDirs[3].'\\vendor\\easycorp\\easyadmin-bundle\\src/Resources/translations\\messages.bg.xlf'), 5 => ($this->targetDirs[3].'\\vendor\\knplabs\\knp-paginator-bundle/Resources/translations\\KnpPaginatorBundle.bg.xliff')], 'ca' => [0 => ($this->targetDirs[3].'\\vendor\\symfony\\validator/Resources/translations\\validators.ca.xlf'), 1 => ($this->targetDirs[3].'\\vendor\\symfony\\form/Resources/translations\\validators.ca.xlf'), 2 => ($this->targetDirs[3].'\\vendor\\symfony\\security-core/Resources/translations\\security.ca.xlf'), 3 => ($this->targetDirs[3].'\\vendor\\easycorp\\easyadmin-bundle\\src/Resources/translations\\EasyAdminBundle.ca.xlf'), 4 => ($this->targetDirs[3].'\\vendor\\easycorp\\easyadmin-bundle\\src/Resources/translations\\messages.ca.xlf')], 'cs' => [0 => ($this->targetDirs[3].'\\vendor\\symfony\\validator/Resources/translations\\validators.cs.xlf'), 1 => ($this->targetDirs[3].'\\vendor\\symfony\\form/Resources/translations\\validators.cs.xlf'), 2 => ($this->targetDirs[3].'\\vendor\\symfony\\security-core/Resources/translations\\security.cs.xlf'), 3 => ($this->targetDirs[3].'\\vendor\\easycorp\\easyadmin-bundle\\src/Resources/translations\\EasyAdminBundle.cs.xlf'), 4 => ($this->targetDirs[3].'\\vendor\\easycorp\\easyadmin-bundle\\src/Resources/translations\\messages.cs.xlf'), 5 => ($this->targetDirs[3].'\\vendor\\knplabs\\knp-paginator-bundle/Resources/translations\\KnpPaginatorBundle.cs.xliff')], 'cy' => [0 => ($this->targetDirs[3].'\\vendor\\symfony\\validator/Resources/translations\\validators.cy.xlf')], 'da' => [0 => ($this->targetDirs[3].'\\vendor\\symfony\\validator/Resources/translations\\validators.da.xlf'), 1 => ($this->targetDirs[3].'\\vendor\\symfony\\form/Resources/translations\\validators.da.xlf'), 2 => ($this->targetDirs[3].'\\vendor\\symfony\\security-core/Resources/translations\\security.da.xlf'), 3 => ($this->targetDirs[3].'\\vendor\\easycorp\\easyadmin-bundle\\src/Resources/translations\\EasyAdminBundle.da.xlf'), 4 => ($this->targetDirs[3].'\\vendor\\easycorp\\easyadmin-bundle\\src/Resources/translations\\messages.da.xlf'), 5 => ($this->targetDirs[3].'\\vendor\\knplabs\\knp-paginator-bundle/Resources/translations\\KnpPaginatorBundle.da.xliff')], 'de' => [0 => ($this->targetDirs[3].'\\vendor\\symfony\\validator/Resources/translations\\validators.de.xlf'), 1 => ($this->targetDirs[3].'\\vendor\\symfony\\form/Resources/translations\\validators.de.xlf'), 2 => ($this->targetDirs[3].'\\vendor\\symfony\\security-core/Resources/translations\\security.de.xlf'), 3 => ($this->targetDirs[3].'\\vendor\\easycorp\\easyadmin-bundle\\src/Resources/translations\\EasyAdminBundle.de.xlf'), 4 => ($this->targetDirs[3].'\\vendor\\easycorp\\easyadmin-bundle\\src/Resources/translations\\messages.de.xlf'), 5 => ($this->targetDirs[3].'\\vendor\\knplabs\\knp-paginator-bundle/Resources/translations\\KnpPaginatorBundle.de.xliff')], 'el' => [0 => ($this->targetDirs[3].'\\vendor\\symfony\\validator/Resources/translations\\validators.el.xlf'), 1 => ($this->targetDirs[3].'\\vendor\\symfony\\form/Resources/translations\\validators.el.xlf'), 2 => ($this->targetDirs[3].'\\vendor\\symfony\\security-core/Resources/translations\\security.el.xlf'), 3 => ($this->targetDirs[3].'\\vendor\\easycorp\\easyadmin-bundle\\src/Resources/translations\\EasyAdminBundle.el.xlf'), 4 => ($this->targetDirs[3].'\\vendor\\easycorp\\easyadmin-bundle\\src/Resources/translations\\messages.el.xlf')], 'en' => [0 => ($this->targetDirs[3].'\\vendor\\symfony\\validator/Resources/translations\\validators.en.xlf'), 1 => ($this->targetDirs[3].'\\vendor\\symfony\\form/Resources/translations\\validators.en.xlf'), 2 => ($this->targetDirs[3].'\\vendor\\symfony\\security-core/Resources/translations\\security.en.xlf'), 3 => ($this->targetDirs[3].'\\vendor\\easycorp\\easyadmin-bundle\\src/Resources/translations\\EasyAdminBundle.en.xlf'), 4 => ($this->targetDirs[3].'\\vendor\\easycorp\\easyadmin-bundle\\src/Resources/translations\\messages.en.xlf'), 5 => ($this->targetDirs[3].'\\vendor\\knplabs\\knp-paginator-bundle/Resources/translations\\KnpPaginatorBundle.en.xliff')], 'es' => [0 => ($this->targetDirs[3].'\\vendor\\symfony\\validator/Resources/translations\\validators.es.xlf'), 1 => ($this->targetDirs[3].'\\vendor\\symfony\\form/Resources/translations\\validators.es.xlf'), 2 => ($this->targetDirs[3].'\\vendor\\symfony\\security-core/Resources/translations\\security.es.xlf'), 3 => ($this->targetDirs[3].'\\vendor\\easycorp\\easyadmin-bundle\\src/Resources/translations\\EasyAdminBundle.es.xlf'), 4 => ($this->targetDirs[3].'\\vendor\\easycorp\\easyadmin-bundle\\src/Resources/translations\\messages.es.xlf'), 5 => ($this->targetDirs[3].'\\vendor\\knplabs\\knp-paginator-bundle/Resources/translations\\KnpPaginatorBundle.es.xliff')], 'et' => [0 => ($this->targetDirs[3].'\\vendor\\symfony\\validator/Resources/translations\\validators.et.xlf'), 1 => ($this->targetDirs[3].'\\vendor\\symfony\\form/Resources/translations\\validators.et.xlf')], 'eu' => [0 => ($this->targetDirs[3].'\\vendor\\symfony\\validator/Resources/translations\\validators.eu.xlf'), 1 => ($this->targetDirs[3].'\\vendor\\symfony\\form/Resources/translations\\validators.eu.xlf'), 2 => ($this->targetDirs[3].'\\vendor\\symfony\\security-core/Resources/translations\\security.eu.xlf'), 3 => ($this->targetDirs[3].'\\vendor\\easycorp\\easyadmin-bundle\\src/Resources/translations\\EasyAdminBundle.eu.xlf'), 4 => ($this->targetDirs[3].'\\vendor\\easycorp\\easyadmin-bundle\\src/Resources/translations\\messages.eu.xlf'), 5 => ($this->targetDirs[3].'\\vendor\\knplabs\\knp-paginator-bundle/Resources/translations\\KnpPaginatorBundle.eu.xliff')], 'fa' => [0 => ($this->targetDirs[3].'\\vendor\\symfony\\validator/Resources/translations\\validators.fa.xlf'), 1 => ($this->targetDirs[3].'\\vendor\\symfony\\form/Resources/translations\\validators.fa.xlf'), 2 => ($this->targetDirs[3].'\\vendor\\symfony\\security-core/Resources/translations\\security.fa.xlf'), 3 => ($this->targetDirs[3].'\\vendor\\easycorp\\easyadmin-bundle\\src/Resources/translations\\EasyAdminBundle.fa.xlf'), 4 => ($this->targetDirs[3].'\\vendor\\easycorp\\easyadmin-bundle\\src/Resources/translations\\messages.fa.xlf'), 5 => ($this->targetDirs[3].'\\vendor\\knplabs\\knp-paginator-bundle/Resources/translations\\KnpPaginatorBundle.fa.xliff')], 'fi' => [0 => ($this->targetDirs[3].'\\vendor\\symfony\\validator/Resources/translations\\validators.fi.xlf'), 1 => ($this->targetDirs[3].'\\vendor\\symfony\\form/Resources/translations\\validators.fi.xlf'), 2 => ($this->targetDirs[3].'\\vendor\\easycorp\\easyadmin-bundle\\src/Resources/translations\\EasyAdminBundle.fi.xlf'), 3 => ($this->targetDirs[3].'\\vendor\\easycorp\\easyadmin-bundle\\src/Resources/translations\\messages.fi.xlf')], 'fr' => [0 => ($this->targetDirs[3].'\\vendor\\symfony\\validator/Resources/translations\\validators.fr.xlf'), 1 => ($this->targetDirs[3].'\\vendor\\symfony\\form/Resources/translations\\validators.fr.xlf'), 2 => ($this->targetDirs[3].'\\vendor\\symfony\\security-core/Resources/translations\\security.fr.xlf'), 3 => ($this->targetDirs[3].'\\vendor\\easycorp\\easyadmin-bundle\\src/Resources/translations\\EasyAdminBundle.fr.xlf'), 4 => ($this->targetDirs[3].'\\vendor\\easycorp\\easyadmin-bundle\\src/Resources/translations\\messages.fr.xlf'), 5 => ($this->targetDirs[3].'\\vendor\\knplabs\\knp-paginator-bundle/Resources/translations\\KnpPaginatorBundle.fr.xliff')], 'gl' => [0 => ($this->targetDirs[3].'\\vendor\\symfony\\validator/Resources/translations\\validators.gl.xlf'), 1 => ($this->targetDirs[3].'\\vendor\\symfony\\form/Resources/translations\\validators.gl.xlf'), 2 => ($this->targetDirs[3].'\\vendor\\symfony\\security-core/Resources/translations\\security.gl.xlf'), 3 => ($this->targetDirs[3].'\\vendor\\easycorp\\easyadmin-bundle\\src/Resources/translations\\EasyAdminBundle.gl.xlf'), 4 => ($this->targetDirs[3].'\\vendor\\easycorp\\easyadmin-bundle\\src/Resources/translations\\messages.gl.xlf')], 'he' => [0 => ($this->targetDirs[3].'\\vendor\\symfony\\validator/Resources/translations\\validators.he.xlf'), 1 => ($this->targetDirs[3].'\\vendor\\symfony\\form/Resources/translations\\validators.he.xlf'), 2 => ($this->targetDirs[3].'\\vendor\\symfony\\security-core/Resources/translations\\security.he.xlf')], 'hr' => [0 => ($this->targetDirs[3].'\\vendor\\symfony\\validator/Resources/translations\\validators.hr.xlf'), 1 => ($this->targetDirs[3].'\\vendor\\symfony\\form/Resources/translations\\validators.hr.xlf'), 2 => ($this->targetDirs[3].'\\vendor\\symfony\\security-core/Resources/translations\\security.hr.xlf'), 3 => ($this->targetDirs[3].'\\vendor\\easycorp\\easyadmin-bundle\\src/Resources/translations\\EasyAdminBundle.hr.xlf'), 4 => ($this->targetDirs[3].'\\vendor\\easycorp\\easyadmin-bundle\\src/Resources/translations\\messages.hr.xlf')], 'hu' => [0 => ($this->targetDirs[3].'\\vendor\\symfony\\validator/Resources/translations\\validators.hu.xlf'), 1 => ($this->targetDirs[3].'\\vendor\\symfony\\form/Resources/translations\\validators.hu.xlf'), 2 => ($this->targetDirs[3].'\\vendor\\symfony\\security-core/Resources/translations\\security.hu.xlf'), 3 => ($this->targetDirs[3].'\\vendor\\easycorp\\easyadmin-bundle\\src/Resources/translations\\EasyAdminBundle.hu.xlf'), 4 => ($this->targetDirs[3].'\\vendor\\easycorp\\easyadmin-bundle\\src/Resources/translations\\messages.hu.xlf'), 5 => ($this->targetDirs[3].'\\vendor\\knplabs\\knp-paginator-bundle/Resources/translations\\KnpPaginatorBundle.hu.xliff')], 'hy' => [0 => ($this->targetDirs[3].'\\vendor\\symfony\\validator/Resources/translations\\validators.hy.xlf'), 1 => ($this->targetDirs[3].'\\vendor\\symfony\\form/Resources/translations\\validators.hy.xlf')], 'id' => [0 => ($this->targetDirs[3].'\\vendor\\symfony\\validator/Resources/translations\\validators.id.xlf'), 1 => ($this->targetDirs[3].'\\vendor\\symfony\\form/Resources/translations\\validators.id.xlf'), 2 => ($this->targetDirs[3].'\\vendor\\symfony\\security-core/Resources/translations\\security.id.xlf'), 3 => ($this->targetDirs[3].'\\vendor\\knplabs\\knp-paginator-bundle/Resources/translations\\KnpPaginatorBundle.id.xliff')], 'it' => [0 => ($this->targetDirs[3].'\\vendor\\symfony\\validator/Resources/translations\\validators.it.xlf'), 1 => ($this->targetDirs[3].'\\vendor\\symfony\\form/Resources/translations\\validators.it.xlf'), 2 => ($this->targetDirs[3].'\\vendor\\symfony\\security-core/Resources/translations\\security.it.xlf'), 3 => ($this->targetDirs[3].'\\vendor\\easycorp\\easyadmin-bundle\\src/Resources/translations\\EasyAdminBundle.it.xlf'), 4 => ($this->targetDirs[3].'\\vendor\\easycorp\\easyadmin-bundle\\src/Resources/translations\\messages.it.xlf'), 5 => ($this->targetDirs[3].'\\vendor\\knplabs\\knp-paginator-bundle/Resources/translations\\KnpPaginatorBundle.it.xliff')], 'ja' => [0 => ($this->targetDirs[3].'\\vendor\\symfony\\validator/Resources/translations\\validators.ja.xlf'), 1 => ($this->targetDirs[3].'\\vendor\\symfony\\form/Resources/translations\\validators.ja.xlf'), 2 => ($this->targetDirs[3].'\\vendor\\symfony\\security-core/Resources/translations\\security.ja.xlf'), 3 => ($this->targetDirs[3].'\\vendor\\knplabs\\knp-paginator-bundle/Resources/translations\\KnpPaginatorBundle.ja.xliff')], 'lb' => [0 => ($this->targetDirs[3].'\\vendor\\symfony\\validator/Resources/translations\\validators.lb.xlf'), 1 => ($this->targetDirs[3].'\\vendor\\symfony\\form/Resources/translations\\validators.lb.xlf'), 2 => ($this->targetDirs[3].'\\vendor\\symfony\\security-core/Resources/translations\\security.lb.xlf')], 'lt' => [0 => ($this->targetDirs[3].'\\vendor\\symfony\\validator/Resources/translations\\validators.lt.xlf'), 1 => ($this->targetDirs[3].'\\vendor\\symfony\\form/Resources/translations\\validators.lt.xlf'), 2 => ($this->targetDirs[3].'\\vendor\\symfony\\security-core/Resources/translations\\security.lt.xlf'), 3 => ($this->targetDirs[3].'\\vendor\\easycorp\\easyadmin-bundle\\src/Resources/translations\\EasyAdminBundle.lt.xlf'), 4 => ($this->targetDirs[3].'\\vendor\\easycorp\\easyadmin-bundle\\src/Resources/translations\\messages.lt.xlf'), 5 => ($this->targetDirs[3].'\\vendor\\knplabs\\knp-paginator-bundle/Resources/translations\\KnpPaginatorBundle.lt.xliff')], 'lv' => [0 => ($this->targetDirs[3].'\\vendor\\symfony\\validator/Resources/translations\\validators.lv.xlf'), 1 => ($this->targetDirs[3].'\\vendor\\symfony\\form/Resources/translations\\validators.lv.xlf'), 2 => ($this->targetDirs[3].'\\vendor\\symfony\\security-core/Resources/translations\\security.lv.xlf')], 'mn' => [0 => ($this->targetDirs[3].'\\vendor\\symfony\\validator/Resources/translations\\validators.mn.xlf'), 1 => ($this->targetDirs[3].'\\vendor\\symfony\\form/Resources/translations\\validators.mn.xlf')], 'nb' => [0 => ($this->targetDirs[3].'\\vendor\\symfony\\validator/Resources/translations\\validators.nb.xlf'), 1 => ($this->targetDirs[3].'\\vendor\\symfony\\form/Resources/translations\\validators.nb.xlf'), 2 => ($this->targetDirs[3].'\\vendor\\symfony\\security-core/Resources/translations\\security.nb.xlf')], 'nl' => [0 => ($this->targetDirs[3].'\\vendor\\symfony\\validator/Resources/translations\\validators.nl.xlf'), 1 => ($this->targetDirs[3].'\\vendor\\symfony\\form/Resources/translations\\validators.nl.xlf'), 2 => ($this->targetDirs[3].'\\vendor\\symfony\\security-core/Resources/translations\\security.nl.xlf'), 3 => ($this->targetDirs[3].'\\vendor\\easycorp\\easyadmin-bundle\\src/Resources/translations\\EasyAdminBundle.nl.xlf'), 4 => ($this->targetDirs[3].'\\vendor\\easycorp\\easyadmin-bundle\\src/Resources/translations\\messages.nl.xlf'), 5 => ($this->targetDirs[3].'\\vendor\\knplabs\\knp-paginator-bundle/Resources/translations\\KnpPaginatorBundle.nl.xliff')], 'nn' => [0 => ($this->targetDirs[3].'\\vendor\\symfony\\validator/Resources/translations\\validators.nn.xlf'), 1 => ($this->targetDirs[3].'\\vendor\\symfony\\form/Resources/translations\\validators.nn.xlf'), 2 => ($this->targetDirs[3].'\\vendor\\symfony\\security-core/Resources/translations\\security.nn.xlf')], 'no' => [0 => ($this->targetDirs[3].'\\vendor\\symfony\\validator/Resources/translations\\validators.no.xlf'), 1 => ($this->targetDirs[3].'\\vendor\\symfony\\form/Resources/translations\\validators.no.xlf'), 2 => ($this->targetDirs[3].'\\vendor\\symfony\\security-core/Resources/translations\\security.no.xlf'), 3 => ($this->targetDirs[3].'\\vendor\\knplabs\\knp-paginator-bundle/Resources/translations\\KnpPaginatorBundle.no.xliff')], 'pl' => [0 => ($this->targetDirs[3].'\\vendor\\symfony\\validator/Resources/translations\\validators.pl.xlf'), 1 => ($this->targetDirs[3].'\\vendor\\symfony\\form/Resources/translations\\validators.pl.xlf'), 2 => ($this->targetDirs[3].'\\vendor\\symfony\\security-core/Resources/translations\\security.pl.xlf'), 3 => ($this->targetDirs[3].'\\vendor\\easycorp\\easyadmin-bundle\\src/Resources/translations\\EasyAdminBundle.pl.xlf'), 4 => ($this->targetDirs[3].'\\vendor\\easycorp\\easyadmin-bundle\\src/Resources/translations\\messages.pl.xlf'), 5 => ($this->targetDirs[3].'\\vendor\\knplabs\\knp-paginator-bundle/Resources/translations\\KnpPaginatorBundle.pl.xliff')], 'pt' => [0 => ($this->targetDirs[3].'\\vendor\\symfony\\validator/Resources/translations\\validators.pt.xlf'), 1 => ($this->targetDirs[3].'\\vendor\\symfony\\form/Resources/translations\\validators.pt.xlf'), 2 => ($this->targetDirs[3].'\\vendor\\easycorp\\easyadmin-bundle\\src/Resources/translations\\EasyAdminBundle.pt.xlf'), 3 => ($this->targetDirs[3].'\\vendor\\easycorp\\easyadmin-bundle\\src/Resources/translations\\messages.pt.xlf')], 'pt_BR' => [0 => ($this->targetDirs[3].'\\vendor\\symfony\\validator/Resources/translations\\validators.pt_BR.xlf'), 1 => ($this->targetDirs[3].'\\vendor\\symfony\\form/Resources/translations\\validators.pt_BR.xlf'), 2 => ($this->targetDirs[3].'\\vendor\\symfony\\security-core/Resources/translations\\security.pt_BR.xlf'), 3 => ($this->targetDirs[3].'\\vendor\\knplabs\\knp-paginator-bundle/Resources/translations\\KnpPaginatorBundle.pt_BR.xliff')], 'ro' => [0 => ($this->targetDirs[3].'\\vendor\\symfony\\validator/Resources/translations\\validators.ro.xlf'), 1 => ($this->targetDirs[3].'\\vendor\\symfony\\form/Resources/translations\\validators.ro.xlf'), 2 => ($this->targetDirs[3].'\\vendor\\symfony\\security-core/Resources/translations\\security.ro.xlf'), 3 => ($this->targetDirs[3].'\\vendor\\easycorp\\easyadmin-bundle\\src/Resources/translations\\EasyAdminBundle.ro.xlf'), 4 => ($this->targetDirs[3].'\\vendor\\easycorp\\easyadmin-bundle\\src/Resources/translations\\messages.ro.xlf'), 5 => ($this->targetDirs[3].'\\vendor\\knplabs\\knp-paginator-bundle/Resources/translations\\KnpPaginatorBundle.ro.xliff')], 'ru' => [0 => ($this->targetDirs[3].'\\vendor\\symfony\\validator/Resources/translations\\validators.ru.xlf'), 1 => ($this->targetDirs[3].'\\vendor\\symfony\\form/Resources/translations\\validators.ru.xlf'), 2 => ($this->targetDirs[3].'\\vendor\\symfony\\security-core/Resources/translations\\security.ru.xlf'), 3 => ($this->targetDirs[3].'\\vendor\\easycorp\\easyadmin-bundle\\src/Resources/translations\\EasyAdminBundle.ru.xlf'), 4 => ($this->targetDirs[3].'\\vendor\\easycorp\\easyadmin-bundle\\src/Resources/translations\\messages.ru.xlf'), 5 => ($this->targetDirs[3].'\\vendor\\knplabs\\knp-paginator-bundle/Resources/translations\\KnpPaginatorBundle.ru.xliff')], 'sk' => [0 => ($this->targetDirs[3].'\\vendor\\symfony\\validator/Resources/translations\\validators.sk.xlf'), 1 => ($this->targetDirs[3].'\\vendor\\symfony\\form/Resources/translations\\validators.sk.xlf'), 2 => ($this->targetDirs[3].'\\vendor\\symfony\\security-core/Resources/translations\\security.sk.xlf')], 'sl' => [0 => ($this->targetDirs[3].'\\vendor\\symfony\\validator/Resources/translations\\validators.sl.xlf'), 1 => ($this->targetDirs[3].'\\vendor\\symfony\\form/Resources/translations\\validators.sl.xlf'), 2 => ($this->targetDirs[3].'\\vendor\\symfony\\security-core/Resources/translations\\security.sl.xlf'), 3 => ($this->targetDirs[3].'\\vendor\\easycorp\\easyadmin-bundle\\src/Resources/translations\\EasyAdminBundle.sl.xlf'), 4 => ($this->targetDirs[3].'\\vendor\\easycorp\\easyadmin-bundle\\src/Resources/translations\\messages.sl.xlf')], 'sq' => [0 => ($this->targetDirs[3].'\\vendor\\symfony\\validator/Resources/translations\\validators.sq.xlf')], 'sr_Cyrl' => [0 => ($this->targetDirs[3].'\\vendor\\symfony\\validator/Resources/translations\\validators.sr_Cyrl.xlf'), 1 => ($this->targetDirs[3].'\\vendor\\symfony\\form/Resources/translations\\validators.sr_Cyrl.xlf'), 2 => ($this->targetDirs[3].'\\vendor\\symfony\\security-core/Resources/translations\\security.sr_Cyrl.xlf')], 'sr_Latn' => [0 => ($this->targetDirs[3].'\\vendor\\symfony\\validator/Resources/translations\\validators.sr_Latn.xlf'), 1 => ($this->targetDirs[3].'\\vendor\\symfony\\form/Resources/translations\\validators.sr_Latn.xlf'), 2 => ($this->targetDirs[3].'\\vendor\\symfony\\security-core/Resources/translations\\security.sr_Latn.xlf')], 'sv' => [0 => ($this->targetDirs[3].'\\vendor\\symfony\\validator/Resources/translations\\validators.sv.xlf'), 1 => ($this->targetDirs[3].'\\vendor\\symfony\\form/Resources/translations\\validators.sv.xlf'), 2 => ($this->targetDirs[3].'\\vendor\\symfony\\security-core/Resources/translations\\security.sv.xlf'), 3 => ($this->targetDirs[3].'\\vendor\\easycorp\\easyadmin-bundle\\src/Resources/translations\\EasyAdminBundle.sv.xlf'), 4 => ($this->targetDirs[3].'\\vendor\\easycorp\\easyadmin-bundle\\src/Resources/translations\\messages.sv.xlf'), 5 => ($this->targetDirs[3].'\\vendor\\knplabs\\knp-paginator-bundle/Resources/translations\\KnpPaginatorBundle.sv.xliff')], 'th' => [0 => ($this->targetDirs[3].'\\vendor\\symfony\\validator/Resources/translations\\validators.th.xlf'), 1 => ($this->targetDirs[3].'\\vendor\\symfony\\security-core/Resources/translations\\security.th.xlf')], 'tl' => [0 => ($this->targetDirs[3].'\\vendor\\symfony\\validator/Resources/translations\\validators.tl.xlf'), 1 => ($this->targetDirs[3].'\\vendor\\symfony\\form/Resources/translations\\validators.tl.xlf'), 2 => ($this->targetDirs[3].'\\vendor\\symfony\\security-core/Resources/translations\\security.tl.xlf')], 'tr' => [0 => ($this->targetDirs[3].'\\vendor\\symfony\\validator/Resources/translations\\validators.tr.xlf'), 1 => ($this->targetDirs[3].'\\vendor\\symfony\\form/Resources/translations\\validators.tr.xlf'), 2 => ($this->targetDirs[3].'\\vendor\\symfony\\security-core/Resources/translations\\security.tr.xlf'), 3 => ($this->targetDirs[3].'\\vendor\\easycorp\\easyadmin-bundle\\src/Resources/translations\\EasyAdminBundle.tr.xlf'), 4 => ($this->targetDirs[3].'\\vendor\\easycorp\\easyadmin-bundle\\src/Resources/translations\\messages.tr.xlf')], 'uk' => [0 => ($this->targetDirs[3].'\\vendor\\symfony\\validator/Resources/translations\\validators.uk.xlf'), 1 => ($this->targetDirs[3].'\\vendor\\symfony\\form/Resources/translations\\validators.uk.xlf'), 2 => ($this->targetDirs[3].'\\vendor\\symfony\\security-core/Resources/translations\\security.uk.xlf'), 3 => ($this->targetDirs[3].'\\vendor\\easycorp\\easyadmin-bundle\\src/Resources/translations\\EasyAdminBundle.uk.xlf'), 4 => ($this->targetDirs[3].'\\vendor\\easycorp\\easyadmin-bundle\\src/Resources/translations\\messages.uk.xlf'), 5 => ($this->targetDirs[3].'\\vendor\\knplabs\\knp-paginator-bundle/Resources/translations\\KnpPaginatorBundle.uk.xliff')], 'vi' => [0 => ($this->targetDirs[3].'\\vendor\\symfony\\validator/Resources/translations\\validators.vi.xlf'), 1 => ($this->targetDirs[3].'\\vendor\\symfony\\form/Resources/translations\\validators.vi.xlf'), 2 => ($this->targetDirs[3].'\\vendor\\symfony\\security-core/Resources/translations\\security.vi.xlf')], 'zh_CN' => [0 => ($this->targetDirs[3].'\\vendor\\symfony\\validator/Resources/translations\\validators.zh_CN.xlf'), 1 => ($this->targetDirs[3].'\\vendor\\symfony\\form/Resources/translations\\validators.zh_CN.xlf'), 2 => ($this->targetDirs[3].'\\vendor\\symfony\\security-core/Resources/translations\\security.zh_CN.xlf'), 3 => ($this->targetDirs[3].'\\vendor\\easycorp\\easyadmin-bundle\\src/Resources/translations\\EasyAdminBundle.zh_CN.xlf'), 4 => ($this->targetDirs[3].'\\vendor\\easycorp\\easyadmin-bundle\\src/Resources/translations\\messages.zh_CN.xlf')], 'zh_TW' => [0 => ($this->targetDirs[3].'\\vendor\\symfony\\validator/Resources/translations\\validators.zh_TW.xlf')], 'pt_PT' => [0 => ($this->targetDirs[3].'\\vendor\\symfony\\security-core/Resources/translations\\security.pt_PT.xlf')], 'sr_RS' => [0 => ($this->targetDirs[3].'\\vendor\\easycorp\\easyadmin-bundle\\src/Resources/translations\\EasyAdminBundle.sr_RS.xlf'), 1 => ($this->targetDirs[3].'\\vendor\\easycorp\\easyadmin-bundle\\src/Resources/translations\\messages.sr_RS.xlf')], 'ky' => [0 => ($this->targetDirs[3].'\\vendor\\knplabs\\knp-paginator-bundle/Resources/translations\\KnpPaginatorBundle.ky.xliff')], 'sw' => [0 => ($this->targetDirs[3].'\\vendor\\knplabs\\knp-paginator-bundle/Resources/translations\\KnpPaginatorBundle.sw.xliff')]], 'scanned_directories' => [0 => ($this->targetDirs[3].'\\vendor\\symfony\\validator/Resources/translations'), 1 => ($this->targetDirs[3].'\\vendor\\symfony\\form/Resources/translations'), 2 => ($this->targetDirs[3].'\\vendor\\symfony\\security-core/Resources/translations'), 3 => ($this->targetDirs[3].'\\vendor\\easycorp\\easyadmin-bundle\\src/Resources/translations'), 4 => ($this->targetDirs[3].'\\vendor\\knplabs\\knp-paginator-bundle/Resources/translations'), 5 => ($this->targetDirs[3].'/translations'), 6 => ($this->targetDirs[3].'\\vendor\\symfony\\framework-bundle/Resources/translations'), 7 => ($this->targetDirs[3].'\\src/Resources/FrameworkBundle/translations'), 8 => ($this->targetDirs[3].'\\vendor\\sensio\\framework-extra-bundle/Resources/translations'), 9 => ($this->targetDirs[3].'\\src/Resources/SensioFrameworkExtraBundle/translations'), 10 => ($this->targetDirs[3].'\\vendor\\doctrine\\doctrine-cache-bundle/Resources/translations'), 11 => ($this->targetDirs[3].'\\src/Resources/DoctrineCacheBundle/translations'), 12 => ($this->targetDirs[3].'\\vendor\\doctrine\\doctrine-bundle/Resources/translations'), 13 => ($this->targetDirs[3].'\\src/Resources/DoctrineBundle/translations'), 14 => ($this->targetDirs[3].'\\vendor\\doctrine\\doctrine-migrations-bundle/Resources/translations'), 15 => ($this->targetDirs[3].'\\src/Resources/DoctrineMigrationsBundle/translations'), 16 => ($this->targetDirs[3].'\\vendor\\symfony\\security-bundle/Resources/translations'), 17 => ($this->targetDirs[3].'\\src/Resources/SecurityBundle/translations'), 18 => ($this->targetDirs[3].'\\vendor\\symfony\\swiftmailer-bundle/Resources/translations'), 19 => ($this->targetDirs[3].'\\src/Resources/SwiftmailerBundle/translations'), 20 => ($this->targetDirs[3].'\\vendor\\symfony\\twig-bundle/Resources/translations'), 21 => ($this->targetDirs[3].'\\src/Resources/TwigBundle/translations'), 22 => ($this->targetDirs[3].'\\vendor\\symfony\\web-profiler-bundle/Resources/translations'), 23 => ($this->targetDirs[3].'\\src/Resources/WebProfilerBundle/translations'), 24 => ($this->targetDirs[3].'\\vendor\\symfony\\monolog-bundle/Resources/translations'), 25 => ($this->targetDirs[3].'\\src/Resources/MonologBundle/translations'), 26 => ($this->targetDirs[3].'\\vendor\\symfony\\debug-bundle/Resources/translations'), 27 => ($this->targetDirs[3].'\\src/Resources/DebugBundle/translations'), 28 => ($this->targetDirs[3].'\\vendor\\symfony\\maker-bundle\\src/Resources/translations'), 29 => ($this->targetDirs[3].'\\src/Resources/MakerBundle/translations'), 30 => ($this->targetDirs[3].'\\vendor\\symfony\\web-server-bundle/Resources/translations'), 31 => ($this->targetDirs[3].'\\src/Resources/WebServerBundle/translations'), 32 => ($this->targetDirs[3].'\\src/Resources/EasyAdminBundle/translations'), 33 => ($this->targetDirs[3].'\\vendor\\liip\\imagine-bundle/Resources/translations'), 34 => ($this->targetDirs[3].'\\src/Resources/LiipImagineBundle/translations'), 35 => ($this->targetDirs[3].'\\src/Resources/KnpPaginatorBundle/translations'), 36 => ($this->targetDirs[3].'\\src/Resources/translations')]]);

        $instance->setConfigCacheFactory(($this->privates['config_cache_factory'] ?? $this->getConfigCacheFactoryService()));
        $instance->setFallbackLocales([0 => 'fr']);

        return $instance;
    }

    /**
     * Gets the private 'twig.loader.native_filesystem' shared service.
     *
     * @return \Symfony\Bundle\TwigBundle\Loader\NativeFilesystemLoader
     */
    protected function getTwig_Loader_NativeFilesystemService()
    {
        $this->privates['twig.loader.native_filesystem'] = $instance = new \Symfony\Bundle\TwigBundle\Loader\NativeFilesystemLoader([], $this->targetDirs[3]);

        $instance->addPath(($this->targetDirs[3].'\\vendor\\symfony\\framework-bundle/Resources/views'), 'Framework');
        $instance->addPath(($this->targetDirs[3].'\\vendor\\symfony\\framework-bundle/Resources/views'), '!Framework');
        $instance->addPath(($this->targetDirs[3].'\\vendor\\doctrine\\doctrine-bundle/Resources/views'), 'Doctrine');
        $instance->addPath(($this->targetDirs[3].'\\vendor\\doctrine\\doctrine-bundle/Resources/views'), '!Doctrine');
        $instance->addPath(($this->targetDirs[3].'\\vendor\\symfony\\security-bundle/Resources/views'), 'Security');
        $instance->addPath(($this->targetDirs[3].'\\vendor\\symfony\\security-bundle/Resources/views'), '!Security');
        $instance->addPath(($this->targetDirs[3].'\\vendor\\symfony\\swiftmailer-bundle/Resources/views'), 'Swiftmailer');
        $instance->addPath(($this->targetDirs[3].'\\vendor\\symfony\\swiftmailer-bundle/Resources/views'), '!Swiftmailer');
        $instance->addPath(($this->targetDirs[3].'/templates/bundles/TwigBundle'), 'Twig');
        $instance->addPath(($this->targetDirs[3].'\\vendor\\symfony\\twig-bundle/Resources/views'), 'Twig');
        $instance->addPath(($this->targetDirs[3].'\\vendor\\symfony\\twig-bundle/Resources/views'), '!Twig');
        $instance->addPath(($this->targetDirs[3].'\\vendor\\symfony\\web-profiler-bundle/Resources/views'), 'WebProfiler');
        $instance->addPath(($this->targetDirs[3].'\\vendor\\symfony\\web-profiler-bundle/Resources/views'), '!WebProfiler');
        $instance->addPath(($this->targetDirs[3].'\\vendor\\symfony\\debug-bundle/Resources/views'), 'Debug');
        $instance->addPath(($this->targetDirs[3].'\\vendor\\symfony\\debug-bundle/Resources/views'), '!Debug');
        $instance->addPath(($this->targetDirs[3].'\\vendor\\easycorp\\easyadmin-bundle\\src/Resources/views'), 'EasyAdmin');
        $instance->addPath(($this->targetDirs[3].'\\vendor\\easycorp\\easyadmin-bundle\\src/Resources/views'), '!EasyAdmin');
        $instance->addPath(($this->targetDirs[3].'\\vendor\\liip\\imagine-bundle/Resources/views'), 'LiipImagine');
        $instance->addPath(($this->targetDirs[3].'\\vendor\\liip\\imagine-bundle/Resources/views'), '!LiipImagine');
        $instance->addPath(($this->targetDirs[3].'\\vendor\\knplabs\\knp-paginator-bundle/Resources/views'), 'KnpPaginator');
        $instance->addPath(($this->targetDirs[3].'\\vendor\\knplabs\\knp-paginator-bundle/Resources/views'), '!KnpPaginator');
        $instance->addPath(($this->targetDirs[3].'/templates'));
        $instance->addPath(($this->targetDirs[3].'\\vendor\\symfony\\twig-bridge/Resources/views/Form'));

        return $instance;
    }

    /**
     * Gets the private 'validator.builder' shared service.
     *
     * @return \Symfony\Component\Validator\ValidatorBuilderInterface
     */
    protected function getValidator_BuilderService()
    {
        $this->privates['validator.builder'] = $instance = \Symfony\Component\Validator\Validation::createValidatorBuilder();

        $instance->setConstraintValidatorFactory(new \Symfony\Component\Validator\ContainerConstraintValidatorFactory(new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($this->getService, [
            'Symfony\\Bridge\\Doctrine\\Validator\\Constraints\\UniqueEntityValidator' => ['privates', 'doctrine.orm.validator.unique', 'getDoctrine_Orm_Validator_UniqueService.php', true],
            'Symfony\\Component\\Security\\Core\\Validator\\Constraints\\UserPasswordValidator' => ['privates', 'security.validator.user_password', 'getSecurity_Validator_UserPasswordService.php', true],
            'Symfony\\Component\\Validator\\Constraints\\EmailValidator' => ['privates', 'validator.email', 'getValidator_EmailService.php', true],
            'Symfony\\Component\\Validator\\Constraints\\ExpressionValidator' => ['privates', 'validator.expression', 'getValidator_ExpressionService.php', true],
            'Symfony\\Component\\Validator\\Constraints\\NotCompromisedPasswordValidator' => ['privates', 'validator.not_compromised_password', 'getValidator_NotCompromisedPasswordService.php', true],
            'doctrine.orm.validator.unique' => ['privates', 'doctrine.orm.validator.unique', 'getDoctrine_Orm_Validator_UniqueService.php', true],
            'security.validator.user_password' => ['privates', 'security.validator.user_password', 'getSecurity_Validator_UserPasswordService.php', true],
            'validator.expression' => ['privates', 'validator.expression', 'getValidator_ExpressionService.php', true],
        ], [
            'Symfony\\Bridge\\Doctrine\\Validator\\Constraints\\UniqueEntityValidator' => '?',
            'Symfony\\Component\\Security\\Core\\Validator\\Constraints\\UserPasswordValidator' => '?',
            'Symfony\\Component\\Validator\\Constraints\\EmailValidator' => '?',
            'Symfony\\Component\\Validator\\Constraints\\ExpressionValidator' => '?',
            'Symfony\\Component\\Validator\\Constraints\\NotCompromisedPasswordValidator' => '?',
            'doctrine.orm.validator.unique' => '?',
            'security.validator.user_password' => '?',
            'validator.expression' => '?',
        ])));
        $instance->setTranslator(new \Symfony\Component\Validator\Util\LegacyTranslatorProxy(($this->services['translator'] ?? $this->getTranslatorService())));
        $instance->setTranslationDomain('validators');
        $instance->addXmlMappings([0 => ($this->targetDirs[3].'\\vendor\\symfony\\form/Resources/config/validation.xml')]);
        $instance->enableAnnotationMapping(($this->privates['annotations.cached_reader'] ?? $this->getAnnotations_CachedReaderService()));
        $instance->addMethodMapping('loadValidatorMetadata');
        $instance->addObjectInitializers([0 => new \Symfony\Bridge\Doctrine\Validator\DoctrineInitializer(($this->services['doctrine'] ?? $this->getDoctrineService()))]);
        $instance->addLoader(new \Symfony\Bridge\Doctrine\Validator\DoctrineLoader(($this->services['doctrine.orm.default_entity_manager'] ?? $this->getDoctrine_Orm_DefaultEntityManagerService()), NULL));

        return $instance;
    }

    /**
     * Gets the private 'var_dumper.html_dumper' shared service.
     *
     * @return \Symfony\Component\VarDumper\Dumper\HtmlDumper
     */
    protected function getVarDumper_HtmlDumperService()
    {
        $this->privates['var_dumper.html_dumper'] = $instance = new \Symfony\Component\VarDumper\Dumper\HtmlDumper(NULL, 'UTF-8', 0);

        $instance->setDisplayOptions(['fileLinkFormat' => ($this->privates['debug.file_link_formatter'] ?? $this->getDebug_FileLinkFormatterService())]);

        return $instance;
    }

    /**
     * Gets the private 'var_dumper.server_connection' shared service.
     *
     * @return \Symfony\Component\VarDumper\Server\Connection
     */
    protected function getVarDumper_ServerConnectionService()
    {
        return $this->privates['var_dumper.server_connection'] = new \Symfony\Component\VarDumper\Server\Connection('tcp://'.$this->getEnv('string:VAR_DUMPER_SERVER'), ['source' => new \Symfony\Component\VarDumper\Dumper\ContextProvider\SourceContextProvider('UTF-8', $this->targetDirs[3], ($this->privates['debug.file_link_formatter'] ?? $this->getDebug_FileLinkFormatterService())), 'request' => new \Symfony\Component\VarDumper\Dumper\ContextProvider\RequestContextProvider(($this->services['request_stack'] ?? ($this->services['request_stack'] = new \Symfony\Component\HttpFoundation\RequestStack()))), 'cli' => new \Symfony\Component\VarDumper\Dumper\ContextProvider\CliContextProvider()]);
    }

    /**
     * Gets the private 'web_profiler.csp.handler' shared service.
     *
     * @return \Symfony\Bundle\WebProfilerBundle\Csp\ContentSecurityPolicyHandler
     */
    protected function getWebProfiler_Csp_HandlerService()
    {
        return $this->privates['web_profiler.csp.handler'] = new \Symfony\Bundle\WebProfilerBundle\Csp\ContentSecurityPolicyHandler(new \Symfony\Bundle\WebProfilerBundle\Csp\NonceGenerator());
    }

    /**
     * Gets the private 'web_profiler.debug_toolbar' shared service.
     *
     * @return \Symfony\Bundle\WebProfilerBundle\EventListener\WebDebugToolbarListener
     */
    protected function getWebProfiler_DebugToolbarService()
    {
        return $this->privates['web_profiler.debug_toolbar'] = new \Symfony\Bundle\WebProfilerBundle\EventListener\WebDebugToolbarListener(($this->services['twig'] ?? $this->getTwigService()), false, 2, ($this->services['router'] ?? $this->getRouterService()), '^/((index|app(_[\\w]+)?)\\.php/)?_wdt', ($this->privates['web_profiler.csp.handler'] ?? $this->getWebProfiler_Csp_HandlerService()));
    }

    public function getParameter($name)
    {
        $name = (string) $name;
        if (isset($this->buildParameters[$name])) {
            return $this->buildParameters[$name];
        }

        if (!(isset($this->parameters[$name]) || isset($this->loadedDynamicParameters[$name]) || array_key_exists($name, $this->parameters))) {
            throw new InvalidArgumentException(sprintf('The parameter "%s" must be defined.', $name));
        }
        if (isset($this->loadedDynamicParameters[$name])) {
            return $this->loadedDynamicParameters[$name] ? $this->dynamicParameters[$name] : $this->getDynamicParameter($name);
        }

        return $this->parameters[$name];
    }

    public function hasParameter($name)
    {
        $name = (string) $name;
        if (isset($this->buildParameters[$name])) {
            return true;
        }

        return isset($this->parameters[$name]) || isset($this->loadedDynamicParameters[$name]) || array_key_exists($name, $this->parameters);
    }

    public function setParameter($name, $value)
    {
        throw new LogicException('Impossible to call set() on a frozen ParameterBag.');
    }

    public function getParameterBag()
    {
        if (null === $this->parameterBag) {
            $parameters = $this->parameters;
            foreach ($this->loadedDynamicParameters as $name => $loaded) {
                $parameters[$name] = $loaded ? $this->dynamicParameters[$name] : $this->getDynamicParameter($name);
            }
            foreach ($this->buildParameters as $name => $value) {
                $parameters[$name] = $value;
            }
            $this->parameterBag = new FrozenParameterBag($parameters);
        }

        return $this->parameterBag;
    }

    private $loadedDynamicParameters = [
        'kernel.root_dir' => false,
        'kernel.project_dir' => false,
        'kernel.cache_dir' => false,
        'kernel.logs_dir' => false,
        'kernel.bundles_metadata' => false,
        'uploads_directory' => false,
        'kernel.secret' => false,
        'session.save_path' => false,
        'validator.mapping.cache.file' => false,
        'translator.default_path' => false,
        'profiler.storage.dsn' => false,
        'debug.container.dump' => false,
        'serializer.mapping.cache.file' => false,
        'doctrine.orm.proxy_dir' => false,
        'doctrine_migrations.dir_name' => false,
        'swiftmailer.spool.default.memory.path' => false,
        'twig.default_path' => false,
        'liip_imagine.resolvers' => false,
        'liip_imagine.loaders' => false,
    ];
    private $dynamicParameters = [];

    /**
     * Computes a dynamic parameter.
     *
     * @param string $name The name of the dynamic parameter to load
     *
     * @return mixed The value of the dynamic parameter
     *
     * @throws InvalidArgumentException When the dynamic parameter does not exist
     */
    private function getDynamicParameter($name)
    {
        switch ($name) {
            case 'kernel.root_dir': $value = ($this->targetDirs[3].'\\src'); break;
            case 'kernel.project_dir': $value = $this->targetDirs[3]; break;
            case 'kernel.cache_dir': $value = $this->targetDirs[0]; break;
            case 'kernel.logs_dir': $value = ($this->targetDirs[2].'\\log'); break;
            case 'kernel.bundles_metadata': $value = [
                'FrameworkBundle' => [
                    'path' => ($this->targetDirs[3].'\\vendor\\symfony\\framework-bundle'),
                    'namespace' => 'Symfony\\Bundle\\FrameworkBundle',
                ],
                'SensioFrameworkExtraBundle' => [
                    'path' => ($this->targetDirs[3].'\\vendor\\sensio\\framework-extra-bundle'),
                    'namespace' => 'Sensio\\Bundle\\FrameworkExtraBundle',
                ],
                'DoctrineCacheBundle' => [
                    'path' => ($this->targetDirs[3].'\\vendor\\doctrine\\doctrine-cache-bundle'),
                    'namespace' => 'Doctrine\\Bundle\\DoctrineCacheBundle',
                ],
                'DoctrineBundle' => [
                    'path' => ($this->targetDirs[3].'\\vendor\\doctrine\\doctrine-bundle'),
                    'namespace' => 'Doctrine\\Bundle\\DoctrineBundle',
                ],
                'DoctrineMigrationsBundle' => [
                    'path' => ($this->targetDirs[3].'\\vendor\\doctrine\\doctrine-migrations-bundle'),
                    'namespace' => 'Doctrine\\Bundle\\MigrationsBundle',
                ],
                'SecurityBundle' => [
                    'path' => ($this->targetDirs[3].'\\vendor\\symfony\\security-bundle'),
                    'namespace' => 'Symfony\\Bundle\\SecurityBundle',
                ],
                'SwiftmailerBundle' => [
                    'path' => ($this->targetDirs[3].'\\vendor\\symfony\\swiftmailer-bundle'),
                    'namespace' => 'Symfony\\Bundle\\SwiftmailerBundle',
                ],
                'TwigBundle' => [
                    'path' => ($this->targetDirs[3].'\\vendor\\symfony\\twig-bundle'),
                    'namespace' => 'Symfony\\Bundle\\TwigBundle',
                ],
                'WebProfilerBundle' => [
                    'path' => ($this->targetDirs[3].'\\vendor\\symfony\\web-profiler-bundle'),
                    'namespace' => 'Symfony\\Bundle\\WebProfilerBundle',
                ],
                'MonologBundle' => [
                    'path' => ($this->targetDirs[3].'\\vendor\\symfony\\monolog-bundle'),
                    'namespace' => 'Symfony\\Bundle\\MonologBundle',
                ],
                'DebugBundle' => [
                    'path' => ($this->targetDirs[3].'\\vendor\\symfony\\debug-bundle'),
                    'namespace' => 'Symfony\\Bundle\\DebugBundle',
                ],
                'MakerBundle' => [
                    'path' => ($this->targetDirs[3].'\\vendor\\symfony\\maker-bundle\\src'),
                    'namespace' => 'Symfony\\Bundle\\MakerBundle',
                ],
                'WebServerBundle' => [
                    'path' => ($this->targetDirs[3].'\\vendor\\symfony\\web-server-bundle'),
                    'namespace' => 'Symfony\\Bundle\\WebServerBundle',
                ],
                'EasyAdminBundle' => [
                    'path' => ($this->targetDirs[3].'\\vendor\\easycorp\\easyadmin-bundle\\src'),
                    'namespace' => 'EasyCorp\\Bundle\\EasyAdminBundle',
                ],
                'LiipImagineBundle' => [
                    'path' => ($this->targetDirs[3].'\\vendor\\liip\\imagine-bundle'),
                    'namespace' => 'Liip\\ImagineBundle',
                ],
                'KnpPaginatorBundle' => [
                    'path' => ($this->targetDirs[3].'\\vendor\\knplabs\\knp-paginator-bundle'),
                    'namespace' => 'Knp\\Bundle\\PaginatorBundle',
                ],
            ]; break;
            case 'uploads_directory': $value = ($this->targetDirs[3].'/public/media/catalog/lunettes'); break;
            case 'kernel.secret': $value = $this->getEnv('APP_SECRET'); break;
            case 'session.save_path': $value = ($this->targetDirs[0].'/sessions'); break;
            case 'validator.mapping.cache.file': $value = ($this->targetDirs[0].'/validation.php'); break;
            case 'translator.default_path': $value = ($this->targetDirs[3].'/translations'); break;
            case 'profiler.storage.dsn': $value = ('file:'.$this->targetDirs[0].'/profiler'); break;
            case 'debug.container.dump': $value = ($this->targetDirs[0].'/srcApp_KernelDevDebugContainer.xml'); break;
            case 'serializer.mapping.cache.file': $value = ($this->targetDirs[0].'/serialization.php'); break;
            case 'doctrine.orm.proxy_dir': $value = ($this->targetDirs[0].'/doctrine/orm/Proxies'); break;
            case 'doctrine_migrations.dir_name': $value = ($this->targetDirs[3].'/src/Migrations'); break;
            case 'swiftmailer.spool.default.memory.path': $value = ($this->targetDirs[0].'/swiftmailer/spool/default'); break;
            case 'twig.default_path': $value = ($this->targetDirs[3].'/templates'); break;
            case 'liip_imagine.resolvers': $value = [
                'default' => [
                    'web_path' => [
                        'web_root' => ($this->targetDirs[3].'/public'),
                        'cache_prefix' => 'media/cache',
                    ],
                ],
            ]; break;
            case 'liip_imagine.loaders': $value = [
                'default' => [
                    'filesystem' => [
                        'locator' => 'filesystem',
                        'data_root' => [
                            0 => ($this->targetDirs[3].'/public'),
                        ],
                        'allow_unresolvable_data_roots' => false,
                        'bundle_resources' => [
                            'enabled' => false,
                            'access_control_type' => 'blacklist',
                            'access_control_list' => [

                            ],
                        ],
                    ],
                ],
            ]; break;
            default: throw new InvalidArgumentException(sprintf('The dynamic parameter "%s" must be defined.', $name));
        }
        $this->loadedDynamicParameters[$name] = true;

        return $this->dynamicParameters[$name] = $value;
    }

    /**
     * Gets the default parameters.
     *
     * @return array An array of the default parameters
     */
    protected function getDefaultParameters()
    {
        return [
            'kernel.environment' => 'dev',
            'kernel.debug' => true,
            'kernel.name' => 'src',
            'kernel.bundles' => [
                'FrameworkBundle' => 'Symfony\\Bundle\\FrameworkBundle\\FrameworkBundle',
                'SensioFrameworkExtraBundle' => 'Sensio\\Bundle\\FrameworkExtraBundle\\SensioFrameworkExtraBundle',
                'DoctrineCacheBundle' => 'Doctrine\\Bundle\\DoctrineCacheBundle\\DoctrineCacheBundle',
                'DoctrineBundle' => 'Doctrine\\Bundle\\DoctrineBundle\\DoctrineBundle',
                'DoctrineMigrationsBundle' => 'Doctrine\\Bundle\\MigrationsBundle\\DoctrineMigrationsBundle',
                'SecurityBundle' => 'Symfony\\Bundle\\SecurityBundle\\SecurityBundle',
                'SwiftmailerBundle' => 'Symfony\\Bundle\\SwiftmailerBundle\\SwiftmailerBundle',
                'TwigBundle' => 'Symfony\\Bundle\\TwigBundle\\TwigBundle',
                'WebProfilerBundle' => 'Symfony\\Bundle\\WebProfilerBundle\\WebProfilerBundle',
                'MonologBundle' => 'Symfony\\Bundle\\MonologBundle\\MonologBundle',
                'DebugBundle' => 'Symfony\\Bundle\\DebugBundle\\DebugBundle',
                'MakerBundle' => 'Symfony\\Bundle\\MakerBundle\\MakerBundle',
                'WebServerBundle' => 'Symfony\\Bundle\\WebServerBundle\\WebServerBundle',
                'EasyAdminBundle' => 'EasyCorp\\Bundle\\EasyAdminBundle\\EasyAdminBundle',
                'LiipImagineBundle' => 'Liip\\ImagineBundle\\LiipImagineBundle',
                'KnpPaginatorBundle' => 'Knp\\Bundle\\PaginatorBundle\\KnpPaginatorBundle',
            ],
            'kernel.charset' => 'UTF-8',
            'kernel.container_class' => 'srcApp_KernelDevDebugContainer',
            'container.dumper.inline_class_loader' => true,
            'locale' => 'fr',
            'fragment.renderer.hinclude.global_template' => '',
            'fragment.path' => '/_fragment',
            'kernel.http_method_override' => true,
            'kernel.trusted_hosts' => [

            ],
            'kernel.default_locale' => 'fr',
            'templating.helper.code.file_link_format' => NULL,
            'debug.file_link_format' => NULL,
            'session.metadata.storage_key' => '_sf2_meta',
            'session.storage.options' => [
                'cache_limiter' => '0',
                'cookie_secure' => 'auto',
                'cookie_httponly' => true,
                'cookie_samesite' => 'lax',
                'gc_probability' => 1,
            ],
            'session.metadata.update_threshold' => 0,
            'form.type_extension.csrf.enabled' => true,
            'form.type_extension.csrf.field_name' => '_token',
            'asset.request_context.base_path' => '',
            'asset.request_context.secure' => false,
            'validator.mapping.cache.prefix' => '',
            'validator.translation_domain' => 'validators',
            'translator.logging' => false,
            'profiler_listener.only_exceptions' => false,
            'profiler_listener.only_master_requests' => false,
            'debug.error_handler.throw_at' => -1,
            'router.request_context.host' => 'localhost',
            'router.request_context.scheme' => 'http',
            'router.request_context.base_url' => '',
            'router.resource' => 'kernel::loadRoutes',
            'router.cache_class_prefix' => 'srcApp_KernelDevDebugContainer',
            'request_listener.http_port' => 80,
            'request_listener.https_port' => 443,
            'serializer.mapping.cache.prefix' => '',
            'doctrine_cache.apc.class' => 'Doctrine\\Common\\Cache\\ApcCache',
            'doctrine_cache.apcu.class' => 'Doctrine\\Common\\Cache\\ApcuCache',
            'doctrine_cache.array.class' => 'Doctrine\\Common\\Cache\\ArrayCache',
            'doctrine_cache.chain.class' => 'Doctrine\\Common\\Cache\\ChainCache',
            'doctrine_cache.couchbase.class' => 'Doctrine\\Common\\Cache\\CouchbaseCache',
            'doctrine_cache.couchbase.connection.class' => 'Couchbase',
            'doctrine_cache.couchbase.hostnames' => 'localhost:8091',
            'doctrine_cache.file_system.class' => 'Doctrine\\Common\\Cache\\FilesystemCache',
            'doctrine_cache.php_file.class' => 'Doctrine\\Common\\Cache\\PhpFileCache',
            'doctrine_cache.memcache.class' => 'Doctrine\\Common\\Cache\\MemcacheCache',
            'doctrine_cache.memcache.connection.class' => 'Memcache',
            'doctrine_cache.memcache.host' => 'localhost',
            'doctrine_cache.memcache.port' => 11211,
            'doctrine_cache.memcached.class' => 'Doctrine\\Common\\Cache\\MemcachedCache',
            'doctrine_cache.memcached.connection.class' => 'Memcached',
            'doctrine_cache.memcached.host' => 'localhost',
            'doctrine_cache.memcached.port' => 11211,
            'doctrine_cache.mongodb.class' => 'Doctrine\\Common\\Cache\\MongoDBCache',
            'doctrine_cache.mongodb.collection.class' => 'MongoCollection',
            'doctrine_cache.mongodb.connection.class' => 'MongoClient',
            'doctrine_cache.mongodb.server' => 'localhost:27017',
            'doctrine_cache.predis.client.class' => 'Predis\\Client',
            'doctrine_cache.predis.scheme' => 'tcp',
            'doctrine_cache.predis.host' => 'localhost',
            'doctrine_cache.predis.port' => 6379,
            'doctrine_cache.redis.class' => 'Doctrine\\Common\\Cache\\RedisCache',
            'doctrine_cache.redis.connection.class' => 'Redis',
            'doctrine_cache.redis.host' => 'localhost',
            'doctrine_cache.redis.port' => 6379,
            'doctrine_cache.riak.class' => 'Doctrine\\Common\\Cache\\RiakCache',
            'doctrine_cache.riak.bucket.class' => 'Riak\\Bucket',
            'doctrine_cache.riak.connection.class' => 'Riak\\Connection',
            'doctrine_cache.riak.bucket_property_list.class' => 'Riak\\BucketPropertyList',
            'doctrine_cache.riak.host' => 'localhost',
            'doctrine_cache.riak.port' => 8087,
            'doctrine_cache.sqlite3.class' => 'Doctrine\\Common\\Cache\\SQLite3Cache',
            'doctrine_cache.sqlite3.connection.class' => 'SQLite3',
            'doctrine_cache.void.class' => 'Doctrine\\Common\\Cache\\VoidCache',
            'doctrine_cache.wincache.class' => 'Doctrine\\Common\\Cache\\WinCacheCache',
            'doctrine_cache.xcache.class' => 'Doctrine\\Common\\Cache\\XcacheCache',
            'doctrine_cache.zenddata.class' => 'Doctrine\\Common\\Cache\\ZendDataCache',
            'doctrine_cache.security.acl.cache.class' => 'Doctrine\\Bundle\\DoctrineCacheBundle\\Acl\\Model\\AclCache',
            'doctrine.dbal.logger.chain.class' => 'Doctrine\\DBAL\\Logging\\LoggerChain',
            'doctrine.dbal.logger.profiling.class' => 'Doctrine\\DBAL\\Logging\\DebugStack',
            'doctrine.dbal.logger.class' => 'Symfony\\Bridge\\Doctrine\\Logger\\DbalLogger',
            'doctrine.dbal.configuration.class' => 'Doctrine\\DBAL\\Configuration',
            'doctrine.data_collector.class' => 'Doctrine\\Bundle\\DoctrineBundle\\DataCollector\\DoctrineDataCollector',
            'doctrine.dbal.connection.event_manager.class' => 'Symfony\\Bridge\\Doctrine\\ContainerAwareEventManager',
            'doctrine.dbal.connection_factory.class' => 'Doctrine\\Bundle\\DoctrineBundle\\ConnectionFactory',
            'doctrine.dbal.events.mysql_session_init.class' => 'Doctrine\\DBAL\\Event\\Listeners\\MysqlSessionInit',
            'doctrine.dbal.events.oracle_session_init.class' => 'Doctrine\\DBAL\\Event\\Listeners\\OracleSessionInit',
            'doctrine.class' => 'Doctrine\\Bundle\\DoctrineBundle\\Registry',
            'doctrine.entity_managers' => [
                'default' => 'doctrine.orm.default_entity_manager',
            ],
            'doctrine.default_entity_manager' => 'default',
            'doctrine.dbal.connection_factory.types' => [

            ],
            'doctrine.connections' => [
                'default' => 'doctrine.dbal.default_connection',
            ],
            'doctrine.default_connection' => 'default',
            'doctrine.orm.configuration.class' => 'Doctrine\\ORM\\Configuration',
            'doctrine.orm.entity_manager.class' => 'Doctrine\\ORM\\EntityManager',
            'doctrine.orm.manager_configurator.class' => 'Doctrine\\Bundle\\DoctrineBundle\\ManagerConfigurator',
            'doctrine.orm.cache.array.class' => 'Doctrine\\Common\\Cache\\ArrayCache',
            'doctrine.orm.cache.apc.class' => 'Doctrine\\Common\\Cache\\ApcCache',
            'doctrine.orm.cache.memcache.class' => 'Doctrine\\Common\\Cache\\MemcacheCache',
            'doctrine.orm.cache.memcache_host' => 'localhost',
            'doctrine.orm.cache.memcache_port' => 11211,
            'doctrine.orm.cache.memcache_instance.class' => 'Memcache',
            'doctrine.orm.cache.memcached.class' => 'Doctrine\\Common\\Cache\\MemcachedCache',
            'doctrine.orm.cache.memcached_host' => 'localhost',
            'doctrine.orm.cache.memcached_port' => 11211,
            'doctrine.orm.cache.memcached_instance.class' => 'Memcached',
            'doctrine.orm.cache.redis.class' => 'Doctrine\\Common\\Cache\\RedisCache',
            'doctrine.orm.cache.redis_host' => 'localhost',
            'doctrine.orm.cache.redis_port' => 6379,
            'doctrine.orm.cache.redis_instance.class' => 'Redis',
            'doctrine.orm.cache.xcache.class' => 'Doctrine\\Common\\Cache\\XcacheCache',
            'doctrine.orm.cache.wincache.class' => 'Doctrine\\Common\\Cache\\WinCacheCache',
            'doctrine.orm.cache.zenddata.class' => 'Doctrine\\Common\\Cache\\ZendDataCache',
            'doctrine.orm.metadata.driver_chain.class' => 'Doctrine\\Common\\Persistence\\Mapping\\Driver\\MappingDriverChain',
            'doctrine.orm.metadata.annotation.class' => 'Doctrine\\ORM\\Mapping\\Driver\\AnnotationDriver',
            'doctrine.orm.metadata.xml.class' => 'Doctrine\\ORM\\Mapping\\Driver\\SimplifiedXmlDriver',
            'doctrine.orm.metadata.yml.class' => 'Doctrine\\ORM\\Mapping\\Driver\\SimplifiedYamlDriver',
            'doctrine.orm.metadata.php.class' => 'Doctrine\\ORM\\Mapping\\Driver\\PHPDriver',
            'doctrine.orm.metadata.staticphp.class' => 'Doctrine\\ORM\\Mapping\\Driver\\StaticPHPDriver',
            'doctrine.orm.proxy_cache_warmer.class' => 'Symfony\\Bridge\\Doctrine\\CacheWarmer\\ProxyCacheWarmer',
            'form.type_guesser.doctrine.class' => 'Symfony\\Bridge\\Doctrine\\Form\\DoctrineOrmTypeGuesser',
            'doctrine.orm.validator.unique.class' => 'Symfony\\Bridge\\Doctrine\\Validator\\Constraints\\UniqueEntityValidator',
            'doctrine.orm.validator_initializer.class' => 'Symfony\\Bridge\\Doctrine\\Validator\\DoctrineInitializer',
            'doctrine.orm.security.user.provider.class' => 'Symfony\\Bridge\\Doctrine\\Security\\User\\EntityUserProvider',
            'doctrine.orm.listeners.resolve_target_entity.class' => 'Doctrine\\ORM\\Tools\\ResolveTargetEntityListener',
            'doctrine.orm.listeners.attach_entity_listeners.class' => 'Doctrine\\ORM\\Tools\\AttachEntityListenersListener',
            'doctrine.orm.naming_strategy.default.class' => 'Doctrine\\ORM\\Mapping\\DefaultNamingStrategy',
            'doctrine.orm.naming_strategy.underscore.class' => 'Doctrine\\ORM\\Mapping\\UnderscoreNamingStrategy',
            'doctrine.orm.quote_strategy.default.class' => 'Doctrine\\ORM\\Mapping\\DefaultQuoteStrategy',
            'doctrine.orm.quote_strategy.ansi.class' => 'Doctrine\\ORM\\Mapping\\AnsiQuoteStrategy',
            'doctrine.orm.entity_listener_resolver.class' => 'Doctrine\\Bundle\\DoctrineBundle\\Mapping\\ContainerEntityListenerResolver',
            'doctrine.orm.second_level_cache.default_cache_factory.class' => 'Doctrine\\ORM\\Cache\\DefaultCacheFactory',
            'doctrine.orm.second_level_cache.default_region.class' => 'Doctrine\\ORM\\Cache\\Region\\DefaultRegion',
            'doctrine.orm.second_level_cache.filelock_region.class' => 'Doctrine\\ORM\\Cache\\Region\\FileLockRegion',
            'doctrine.orm.second_level_cache.logger_chain.class' => 'Doctrine\\ORM\\Cache\\Logging\\CacheLoggerChain',
            'doctrine.orm.second_level_cache.logger_statistics.class' => 'Doctrine\\ORM\\Cache\\Logging\\StatisticsCacheLogger',
            'doctrine.orm.second_level_cache.cache_configuration.class' => 'Doctrine\\ORM\\Cache\\CacheConfiguration',
            'doctrine.orm.second_level_cache.regions_configuration.class' => 'Doctrine\\ORM\\Cache\\RegionsConfiguration',
            'doctrine.orm.auto_generate_proxy_classes' => true,
            'doctrine.orm.proxy_namespace' => 'Proxies',
            'doctrine_migrations.namespace' => 'DoctrineMigrations',
            'doctrine_migrations.table_name' => 'migration_versions',
            'doctrine_migrations.column_name' => 'version',
            'doctrine_migrations.column_length' => 14,
            'doctrine_migrations.executed_at_column_name' => 'executed_at',
            'doctrine_migrations.all_or_nothing' => false,
            'doctrine_migrations.name' => 'Application Migrations',
            'doctrine_migrations.custom_template' => NULL,
            'doctrine_migrations.organize_migrations' => false,
            'security.authentication.trust_resolver.anonymous_class' => NULL,
            'security.authentication.trust_resolver.rememberme_class' => NULL,
            'security.role_hierarchy.roles' => [
                'ROLE_ADMIN' => [
                    0 => 'ROLE_USER',
                ],
            ],
            'security.access.denied_url' => NULL,
            'security.authentication.manager.erase_credentials' => true,
            'security.authentication.session_strategy.strategy' => 'migrate',
            'security.access.always_authenticate_before_granting' => false,
            'security.authentication.hide_user_not_found' => true,
            'swiftmailer.mailer.default.transport.name' => 'dynamic',
            'swiftmailer.mailer.default.spool.enabled' => true,
            'swiftmailer.mailer.default.plugin.impersonate' => NULL,
            'swiftmailer.mailer.default.single_address' => NULL,
            'swiftmailer.mailer.default.delivery.enabled' => true,
            'swiftmailer.spool.enabled' => true,
            'swiftmailer.delivery.enabled' => true,
            'swiftmailer.single_address' => NULL,
            'swiftmailer.mailers' => [
                'default' => 'swiftmailer.mailer.default',
            ],
            'swiftmailer.default_mailer' => 'default',
            'twig.exception_listener.controller' => 'twig.controller.exception::showAction',
            'twig.form.resources' => [
                0 => 'form_div_layout.html.twig',
                1 => '@LiipImagine/Form/form_div_layout.html.twig',
            ],
            'web_profiler.debug_toolbar.intercept_redirects' => false,
            'web_profiler.debug_toolbar.mode' => 2,
            'monolog.use_microseconds' => true,
            'monolog.swift_mailer.handlers' => [

            ],
            'monolog.handlers_to_channels' => [
                'monolog.handler.console' => [
                    'type' => 'exclusive',
                    'elements' => [
                        0 => 'event',
                        1 => 'doctrine',
                        2 => 'console',
                    ],
                ],
                'monolog.handler.main' => [
                    'type' => 'exclusive',
                    'elements' => [
                        0 => 'event',
                    ],
                ],
            ],
            'env(VAR_DUMPER_SERVER)' => '127.0.0.1:9912',
            'easyadmin.config' => [
                'user' => [
                    'name_property_path' => 'username',
                    'display_avatar' => true,
                    'display_name' => true,
                    'avatar_property_path' => NULL,
                ],
                'site_name' => 'Lunettes <em style="font-size: 80%">Tableau de board</em>',
                'entities' => [
                    'Color' => [
                        'class' => 'App\\Entity\\Color',
                        'form' => [
                            'fields' => [
                                0 => 'name',
                                1 => 'slug',
                                2 => [
                                    'property' => 'color',
                                    'type' => 'color',
                                ],
                            ],
                        ],
                        'list' => [
                            'actions' => [
                                0 => [
                                    'name' => 'edit',
                                    'icon' => 'pencil',
                                    'label' => false,
                                    'css_class' => 'btn btn-secondary',
                                ],
                                1 => [
                                    'name' => 'delete',
                                    'icon' => 'trash',
                                    'label' => false,
                                    'css_class' => 'btn btn-danger',
                                ],
                            ],
                        ],
                        'name' => 'Color',
                    ],
                    'Forme' => [
                        'class' => 'App\\Entity\\Forme',
                        'list' => [
                            'actions' => [
                                0 => [
                                    'name' => 'edit',
                                    'icon' => 'pencil',
                                    'label' => false,
                                    'css_class' => 'btn btn-secondary',
                                ],
                                1 => [
                                    'name' => 'delete',
                                    'icon' => 'trash',
                                    'label' => false,
                                    'css_class' => 'btn btn-danger',
                                ],
                            ],
                        ],
                        'name' => 'Forme',
                    ],
                    'Lunettes' => [
                        'class' => 'App\\Entity\\Lunettes',
                        'form' => [
                            'fields' => [
                                0 => [
                                    'type' => 'group',
                                    'columns' => 6,
                                    'label' => 'Informations de base',
                                    'icon' => 'glasses',
                                ],
                                1 => [
                                    'property' => 'marque',
                                    'type' => 'entity',
                                    'placeholder' => 'Choisissez une marque',
                                    'type_options' => [
                                        'class' => 'App\\Entity\\Marque',
                                    ],
                                ],
                                2 => [
                                    'property' => 'ref',
                                    'label' => 'Référence',
                                ],
                                3 => [
                                    'property' => 'genre',
                                    'type' => 'choice',
                                    'type_options' => [
                                        'expanded' => true,
                                        'placeholder' => 'Choisissez un genere',
                                        'choices' => [
                                            'Homme' => 'h',
                                            'Femme' => 'f',
                                            'Enfant' => 'e',
                                            'Mixte' => 'm',
                                        ],
                                    ],
                                ],
                                4 => [
                                    'property' => 'type',
                                    'type' => 'choice',
                                    'type_options' => [
                                        'expanded' => false,
                                        'placeholder' => 'Choisissez un type',
                                        'choices' => [
                                            'Lunettes de vue' => 'vue',
                                            'Lunettes de soleil' => 'soleil',
                                            'Lunettes de contact' => 'contact',
                                        ],
                                    ],
                                ],
                                5 => [
                                    'property' => 'prix',
                                ],
                                6 => [
                                    'type' => 'group',
                                    'label' => 'Les options',
                                    'columns' => 6,
                                ],
                                7 => [
                                    'property' => 'matiere',
                                    'type' => 'choice',
                                    'type_options' => [
                                        'placeholder' => 'Choisissez une matière',
                                        'choices' => [
                                            'Métal' => 'metal',
                                            'Plastique' => 'plastic',
                                            'Titane' => 'titane',
                                        ],
                                    ],
                                ],
                                8 => [
                                    'property' => 'taille',
                                    'type' => 'choice',
                                    'type_options' => [
                                        'placeholder' => 'Choisissez un taille',
                                        'choices' => [
                                            'Adulte L' => 'l',
                                            'Adulte M' => 's',
                                            'Adulte S' => 's',
                                        ],
                                    ],
                                ],
                                9 => [
                                    'property' => 'files',
                                    'type' => 'file',
                                    'type_options' => [
                                        'multiple' => true,
                                    ],
                                    'label' => 'images',
                                    'help' => 'largeur min 800 px et l\'hauteur min 500 px ',
                                ],
                                10 => [
                                    'property' => 'forme',
                                ],
                                11 => [
                                    'property' => 'style',
                                ],
                                12 => [
                                    'property' => 'color',
                                    'type' => 'entity',
                                    'type_options' => [
                                        'class' => 'App\\Entity\\Color',
                                    ],
                                ],
                            ],
                        ],
                        'list' => [
                            'actions' => [
                                0 => [
                                    'name' => 'edit',
                                    'icon' => 'pencil',
                                    'label' => false,
                                    'css_class' => 'btn btn-secondary',
                                ],
                                1 => [
                                    'name' => 'delete',
                                    'icon' => 'trash',
                                    'label' => false,
                                    'css_class' => 'btn btn-danger',
                                ],
                            ],
                        ],
                        'name' => 'Lunettes',
                    ],
                    'Marque' => [
                        'class' => 'App\\Entity\\Marque',
                        'list' => [
                            'actions' => [
                                0 => [
                                    'name' => 'edit',
                                    'icon' => 'pencil',
                                    'label' => false,
                                    'css_class' => 'btn btn-secondary',
                                ],
                                1 => [
                                    'name' => 'delete',
                                    'icon' => 'trash',
                                    'label' => false,
                                    'css_class' => 'btn btn-danger',
                                ],
                            ],
                        ],
                        'name' => 'Marque',
                    ],
                    'Style' => [
                        'class' => 'App\\Entity\\Style',
                        'list' => [
                            'actions' => [
                                0 => [
                                    'name' => 'edit',
                                    'icon' => 'pencil',
                                    'label' => false,
                                    'css_class' => 'btn btn-secondary',
                                ],
                                1 => [
                                    'name' => 'delete',
                                    'icon' => 'trash',
                                    'label' => false,
                                    'css_class' => 'btn btn-danger',
                                ],
                            ],
                        ],
                        'name' => 'Style',
                    ],
                    'User' => [
                        'class' => 'App\\Entity\\User',
                        'list' => [
                            'actions' => [
                                0 => [
                                    'name' => 'edit',
                                    'icon' => 'pencil',
                                    'label' => false,
                                    'css_class' => 'btn btn-secondary',
                                ],
                                1 => [
                                    'name' => 'delete',
                                    'icon' => 'trash',
                                    'label' => false,
                                    'css_class' => 'btn btn-danger',
                                ],
                            ],
                        ],
                        'name' => 'User',
                    ],
                ],
                'design' => [
                    'menu' => [
                        0 => [
                            'label' => 'Accueil',
                            'url' => 'http://localhost:8000/',
                            'icon' => 'home',
                        ],
                        1 => [
                            'entity' => 'Lunettes',
                            'default' => true,
                            'icon' => 'glasses',
                        ],
                        2 => [
                            'label' => 'Les categories',
                        ],
                        3 => [
                            'entity' => 'Marque',
                            'icon' => 'signature',
                        ],
                        4 => [
                            'label' => 'Les options',
                        ],
                        5 => [
                            'entity' => 'Forme',
                            'icon' => 'circle-notch',
                        ],
                        6 => [
                            'entity' => 'Style',
                            'icon' => 'splotch',
                        ],
                        7 => [
                            'entity' => 'Color',
                            'icon' => 'fill-drip',
                        ],
                        8 => [
                            'label' => 'Profile',
                        ],
                        9 => [
                            'entity' => 'User',
                            'label' => 'Utilisateur',
                            'icon' => 'user-o',
                        ],
                    ],
                    'brand_color' => 'hsl(230, 55%, 60%)',
                    'form_theme' => [
                        0 => '@EasyAdmin/form/bootstrap_4.html.twig',
                    ],
                    'assets' => [
                        'css' => [

                        ],
                        'js' => [

                        ],
                        'favicon' => [
                            'path' => 'favicon.ico',
                            'mime_type' => 'image/x-icon',
                        ],
                    ],
                ],
                'formats' => [
                    'date' => 'Y-m-d',
                    'time' => 'H:i:s',
                    'datetime' => 'F j, Y H:i',
                    'dateinterval' => '%y Year(s) %m Month(s) %d Day(s)',
                ],
                'disabled_actions' => [

                ],
                'translation_domain' => 'messages',
                'list' => [
                    'actions' => [

                    ],
                    'collapse_actions' => false,
                    'batch_actions' => [

                    ],
                    'max_results' => 15,
                    'item_permission' => NULL,
                ],
                'search' => [

                ],
                'edit' => [
                    'actions' => [

                    ],
                    'item_permission' => NULL,
                ],
                'new' => [
                    'actions' => [

                    ],
                    'item_permission' => NULL,
                ],
                'show' => [
                    'actions' => [

                    ],
                    'max_results' => 10,
                    'item_permission' => NULL,
                ],
            ],
            'liip_imagine.jpegoptim.binary' => '/usr/bin/jpegoptim',
            'liip_imagine.jpegoptim.stripAll' => true,
            'liip_imagine.jpegoptim.max' => NULL,
            'liip_imagine.jpegoptim.progressive' => true,
            'liip_imagine.jpegoptim.tempDir' => NULL,
            'liip_imagine.optipng.binary' => '/usr/bin/optipng',
            'liip_imagine.optipng.level' => 7,
            'liip_imagine.optipng.stripAll' => true,
            'liip_imagine.optipng.tempDir' => NULL,
            'liip_imagine.pngquant.binary' => '/usr/bin/pngquant',
            'liip_imagine.mozjpeg.binary' => '/opt/mozjpeg/bin/cjpeg',
            'liip_imagine.driver_service' => 'liip_imagine.gd',
            'liip_imagine.cache.resolver.default' => 'default',
            'liip_imagine.default_image' => NULL,
            'liip_imagine.filter_sets' => [
                'small' => [
                    'quality' => 75,
                    'jpeg_quality' => NULL,
                    'png_compression_level' => NULL,
                    'png_compression_filter' => NULL,
                    'format' => NULL,
                    'animated' => false,
                    'cache' => NULL,
                    'data_loader' => NULL,
                    'default_image' => NULL,
                    'filters' => [
                        'scale' => [
                            'dim' => [
                                0 => 210,
                                1 => 140,
                            ],
                        ],
                    ],
                    'post_processors' => [

                    ],
                ],
                'mid' => [
                    'quality' => 75,
                    'jpeg_quality' => NULL,
                    'png_compression_level' => NULL,
                    'png_compression_filter' => NULL,
                    'format' => NULL,
                    'animated' => false,
                    'cache' => NULL,
                    'data_loader' => NULL,
                    'default_image' => NULL,
                    'filters' => [
                        'scale' => [
                            'dim' => [
                                0 => 340,
                                1 => 177,
                            ],
                        ],
                    ],
                    'post_processors' => [

                    ],
                ],
                'big' => [
                    'quality' => 100,
                    'jpeg_quality' => NULL,
                    'png_compression_level' => NULL,
                    'png_compression_filter' => NULL,
                    'format' => NULL,
                    'animated' => false,
                    'cache' => NULL,
                    'data_loader' => NULL,
                    'default_image' => NULL,
                    'filters' => [
                        'scale' => [
                            'dim' => [
                                0 => 600,
                                1 => 300,
                            ],
                        ],
                    ],
                    'post_processors' => [

                    ],
                ],
            ],
            'liip_imagine.binary.loader.default' => 'default',
            'liip_imagine.controller.filter_action' => 'Liip\\ImagineBundle\\Controller\\ImagineController::filterAction',
            'liip_imagine.controller.filter_runtime_action' => 'Liip\\ImagineBundle\\Controller\\ImagineController::filterRuntimeAction',
            'knp_paginator.template.pagination' => '@KnpPaginator/Pagination/twitter_bootstrap_v4_pagination.html.twig',
            'knp_paginator.template.filtration' => '@KnpPaginator/Pagination/filtration.html.twig',
            'knp_paginator.template.sortable' => 'KnpPaginator/Pagination/twitter_bootstrap_v4_sortable_link.html.twig',
            'knp_paginator.page_range' => 5,
            'data_collector.templates' => [
                'data_collector.request' => [
                    0 => 'request',
                    1 => '@WebProfiler/Collector/request.html.twig',
                ],
                'data_collector.time' => [
                    0 => 'time',
                    1 => '@WebProfiler/Collector/time.html.twig',
                ],
                'data_collector.memory' => [
                    0 => 'memory',
                    1 => '@WebProfiler/Collector/memory.html.twig',
                ],
                'data_collector.validator' => [
                    0 => 'validator',
                    1 => '@WebProfiler/Collector/validator.html.twig',
                ],
                'data_collector.ajax' => [
                    0 => 'ajax',
                    1 => '@WebProfiler/Collector/ajax.html.twig',
                ],
                'data_collector.form' => [
                    0 => 'form',
                    1 => '@WebProfiler/Collector/form.html.twig',
                ],
                'data_collector.exception' => [
                    0 => 'exception',
                    1 => '@WebProfiler/Collector/exception.html.twig',
                ],
                'data_collector.logger' => [
                    0 => 'logger',
                    1 => '@WebProfiler/Collector/logger.html.twig',
                ],
                'data_collector.events' => [
                    0 => 'events',
                    1 => '@WebProfiler/Collector/events.html.twig',
                ],
                'data_collector.router' => [
                    0 => 'router',
                    1 => '@WebProfiler/Collector/router.html.twig',
                ],
                'data_collector.cache' => [
                    0 => 'cache',
                    1 => '@WebProfiler/Collector/cache.html.twig',
                ],
                'data_collector.translation' => [
                    0 => 'translation',
                    1 => '@WebProfiler/Collector/translation.html.twig',
                ],
                'data_collector.security' => [
                    0 => 'security',
                    1 => '@Security/Collector/security.html.twig',
                ],
                'data_collector.twig' => [
                    0 => 'twig',
                    1 => '@WebProfiler/Collector/twig.html.twig',
                ],
                'data_collector.doctrine' => [
                    0 => 'db',
                    1 => '@Doctrine/Collector/db.html.twig',
                ],
                'swiftmailer.data_collector' => [
                    0 => 'swiftmailer',
                    1 => '@Swiftmailer/Collector/swiftmailer.html.twig',
                ],
                'data_collector.dump' => [
                    0 => 'dump',
                    1 => '@Debug/Profiler/dump.html.twig',
                ],
                'easyadmin.data_collector' => [
                    0 => 'easyadmin',
                    1 => '@EasyAdmin/data_collector/easyadmin.html.twig',
                ],
                'data_collector.config' => [
                    0 => 'config',
                    1 => '@WebProfiler/Collector/config.html.twig',
                ],
            ],
            'console.command.ids' => [
                0 => 'console.command.public_alias.doctrine_cache.contains_command',
                1 => 'console.command.public_alias.doctrine_cache.delete_command',
                2 => 'console.command.public_alias.doctrine_cache.flush_command',
                3 => 'console.command.public_alias.doctrine_cache.stats_command',
                4 => 'console.command.public_alias.doctrine_migrations.diff_command',
                5 => 'console.command.public_alias.doctrine_migrations.dump_schema_command',
                6 => 'console.command.public_alias.doctrine_migrations.execute_command',
                7 => 'console.command.public_alias.doctrine_migrations.generate_command',
                8 => 'console.command.public_alias.doctrine_migrations.latest_command',
                9 => 'console.command.public_alias.doctrine_migrations.migrate_command',
                10 => 'console.command.public_alias.doctrine_migrations.rollup_command',
                11 => 'console.command.public_alias.doctrine_migrations.status_command',
                12 => 'console.command.public_alias.doctrine_migrations.up_to_date_command',
                13 => 'console.command.public_alias.doctrine_migrations.version_command',
            ],
        ];
    }
}
