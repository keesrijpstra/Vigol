<?php

namespace App;

enum GuardNameType: string
{
    case web = 'web';
    case api = 'api';
    case admin = 'admin';
    case user = 'user';
    case super_admin = 'super_admin';
    case customer = 'customer';
    case guest = 'guest';
    
    /**
     * Get the color associated with the guard type
     */
    public function color(): string
    {
        return match($this) {
            self::web => 'gray',
            self::api => 'blue',
            self::admin => 'indigo',
            self::user => 'green',
            self::super_admin => 'purple',
            self::customer => 'amber',
            self::guest => 'slate',
        };
    }
    
    /**
     * Get the display label for the guard type
     */
    public function label(): string
    {
        return match($this) {
            self::web => 'Web Interface',
            self::api => 'API Access',
            self::admin => 'Administrator',
            self::user => 'Standard User',
            self::super_admin => 'Super Administrator',
            self::customer => 'Customer',
            self::guest => 'Guest User',
        };
    }
    
    /**
     * Get hex color code for the guard type (if needed)
     */
    public function hexColor(): string
    {
        return match($this) {
            self::web => '#6B7280',
            self::api => '#3B82F6',
            self::admin => '#4F46E5',
            self::user => '#10B981',
            self::super_admin => '#8B5CF6',
            self::customer => '#F59E0B',
            self::guest => '#64748B',
        };
    }
    
    /**
     * Get tailwind class for styling
     */
    public function tailwindClass(): string
    {
        return match($this) {
            self::web => 'bg-gray-200 text-gray-800',
            self::api => 'bg-blue-200 text-blue-800',
            self::admin => 'bg-indigo-200 text-indigo-800',
            self::user => 'bg-green-200 text-green-800',
            self::super_admin => 'bg-purple-200 text-purple-800',
            self::customer => 'bg-amber-200 text-amber-800',
            self::guest => 'bg-slate-200 text-slate-800',
        };
    }
}
