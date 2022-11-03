<?php

namespace Drupal\commerce_invoice;

use Drupal\entity\EntityPermissionProvider;
use Drupal\Core\Entity\EntityTypeInterface;

/**
 * Provides permissions for invoices.
 */
class InvoicePermissionProvider extends EntityPermissionProvider {

  /**
   * {@inheritdoc}
   */
  public function buildPermissions(EntityTypeInterface $entity_type) {
    $permissions = parent::buildPermissions($entity_type);
    // Invoices don't implement EntityOwnerInterface, so they don't get
    // own/any permissions generated by default.
    $permissions['view commerce_invoice']['title'] = (string) t('View any invoice');
    $permissions['view own commerce_invoice'] = [
      'title' => (string) t('View own invoices'),
      'provider' => 'commerce_invoice',
    ];

    return $permissions;
  }

}
