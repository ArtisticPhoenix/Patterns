<?php
namespace evo\pattern\singleton;
/**
 *
 * (c) 2016 Hugh Durham III
 *
 * For license information please view the LICENSE file included with this source code.
 *
 * Multiton pattern.  Classes using this trait should
 * <ul>
 *    <li>Implement \evo\pattern\singleton\SingletonInterface</li>
 *    <li>Be final</li>
 *    <li>Can overwrite init() method</li>
 * </ul>
 *
 * @author HughDurham {ArtisticPhoenix}
 * @package Evo
 * @subpackage pattern
 *
 */
trait MultitonTrait{
    
    /**
     *
     * @var array
     */
    private static $instances = [];
    
    /**
     * no access
     */
    final private function __construct()
    {
    }
    
    /**
     * no access
     */
    final private function __clone()
    {
    }
    
    /**
     * no access
     */
    final private function __wakeup()
    {
    }
    
    /**
     *
     * Arguments passed to getInstance are passed to init(),
     * this only happens on instantiation
     *
     * @return self
     */
    public static function getInstance($alias=''){
        if(!isset(self::$instances[$alias])){
            self::$instances[$alias] = new self;
            self::$instances[$alias]->init($alias);
        }
        return self::$instances[$alias];
    }
    
    /**
     *
     * @return boolean
     */
    public static function isInstantiated($alias=''){
        return isset(self::$instances[$alias]) ? true : false;
    }
    
    /**
     * called when the first instance is created (after construct)
     *
     * Overwrite this method with your startup code
     *
     */
    protected function init($alias)
    {
    }
    
}
