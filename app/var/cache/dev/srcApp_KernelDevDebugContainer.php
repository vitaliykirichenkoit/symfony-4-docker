<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerVi79YmY\srcApp_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerVi79YmY/srcApp_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerVi79YmY.legacy');

    return;
}

if (!\class_exists(srcApp_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerVi79YmY\srcApp_KernelDevDebugContainer::class, srcApp_KernelDevDebugContainer::class, false);
}

return new \ContainerVi79YmY\srcApp_KernelDevDebugContainer([
    'container.build_hash' => 'Vi79YmY',
    'container.build_id' => '16769dd9',
    'container.build_time' => 1577352113,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerVi79YmY');
