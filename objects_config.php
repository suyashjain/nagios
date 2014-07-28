<?php


$Objects=Array
(
    'servicedependency' => Array
        (
        ),
    'command' => Array
        (
            'command_name' => 1,
            'command_line' => 1
        ),

    'timeperiod' => Array
        (
            'timeperiod_name' => 1,
            'alias' => 1,
            'monday' => 1,
            'tuesday' => 1,
            'wednesday' => 1,
            'thursday' => 1,
            'friday' => 1,
            'saturday' => 1,
            'sunday' => 1,
            'name' => 1,
            'january' => 1,
            'july' => 1,
            'december' => 1,
            'use' => 1
        ),

    'contact' => Array
        (
            'name' => 1,
            'service_notification_period' => 1,
            'host_notification_period' => 1,
            'service_notification_options' => 1,
            'host_notification_options' => 1,
            'service_notification_commands' => 1,
            'host_notification_commands' => 1,
            'register' => 1,
            'use' => 1,
            'contact_name' => 1,
            'email' => 1,
            'alias' => 1
        ),

    'host' => Array
        (
            'host_name' => 1,
            'address' => 1,
            'alias' => 1,
            'hostgroups' => 1,
            'check_command' => 1,
            'notifications_enabled' => 1,
            'event_handler_enabled' => 1,
            'notification_period' => 1,
            'check_period' => 1,
            'check_interval' => 1,
            'retry_interval' => 1,
            'max_check_attempts' => 1,
            'notification_interval' => 1,
            'notification_options' => 1,
            'contact_groups' => 1,
            'checks_enabled' => 1,
            'display_name' => 1,
            'name' => 1,
            'register' => 1,
            'use' => 1,
            'process_perf_data' => 1,
            'retain_status_information' => 1,
            'retain_nonstatus_information' => 1,
            'notification_period' => 1,
            'flap_detection_enabled' => 1,
            'failure_prediction_enabled' => 1

        ),

    'service' => Array
        (

            'hostgroup_name' => 1,
            'service_description' => 1,
            'check_command' => 1,
            'servicegroups' => 1,
            'contacts' => 1,
            'host_name' => 1,
            'normal_check_interval' => 1,
            'retry_check_interval' => 1,
            'check_period' => 1,
            'max_check_attempts' => 1,
            'check_interval' => 1,
            'retry_interval' => 1,
            'active_checks_enabled' => 1,
            'passive_checks_enabled' => 1,
            'parallelize_check' => 1,
            'obsess_over_service' => 1,
            'check_freshness' => 1,
            'notifications_enabled' => 1,
            'event_handler_enabled' => 1,
            'flap_detection_enabled' => 1,
            'failure_prediction_enabled' => 1,
            'process_perf_data' => 1,
            'retain_status_information' => 1,
            'retain_nonstatus_information' => 1,
            'is_volatile' => 1,
            'contact_groups' => 1,
            'notification_options' => 1,
            'notification_interval' => 1,
            'notification_period' => 1,
            'register' => 1,
            'use' => 1,
            'name' => 1,
            'action_url' => 1
        ),

    'hostgroup' => Array
        (
            'hostgroup_name' => 1,
            'alias' => 1,
            'members' => 1,
            'hostgroup_members' => 1
        ),

    'servicegroup' => Array
        (
            'servicegroup_name' => 1,
            'alias' => 1,
            'members' => 1
        ),

    'contactgroup' => Array
        (
            'contactgroup_name' => 1,
            'alias' => 1,
            'members' => 1
        )

);

?>
