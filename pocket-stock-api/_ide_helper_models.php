<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Product
 *
 * @property int $id
 * @property string $name_product
 * @property int $cantidad_product
 * @property string|null $descripcion_product
 * @property int|null $category_id
 * @property int|null $marca_id
 * @property int|null $proveedor_id
 * @property int|null $rack_id
 * @property int|null $tipo_id
 * @property int|null $crossbar_id
 * @property int|null $status_id
 * @property string|null $foto_product
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product query()
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCantidadProduct($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereDescripcionProduct($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereFotoProduct($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereMarcaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereNombreProduct($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereProveedorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereRackId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereStatusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereTipoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCrossbarId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereUpdatedAt($value)
 */
	class Product extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Category
 *
 * @property int $id
 * @property string $name_category
 * @property string|null $descripcion_category
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category query()
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereDescripcionCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereNombreCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereUpdatedAt($value)
 */
	class Category extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Marca
 *
 * @property int $id
 * @property string $name_marca
 * @property string|null $descripcion_marca
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Marca newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Marca newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Marca query()
 * @method static \Illuminate\Database\Eloquent\Builder|Marca whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Marca whereDescripcionMarca($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Marca whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Marca whereNombreMarca($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Marca whereUpdatedAt($value)
 */
	class Marca extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Payment
 *
 * @property int $id
 * @property string $type
 * @property string $tip
 * @property string $total
 * @property int $ticket_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Payment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Payment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Payment query()
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereTicketId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereTip($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereUpdatedAt($value)
 */
	class Payment extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Proveedor
 *
 * @property int $id
 * @property string $name_proveedor
 * @property string|null $descripcion
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Proveedor newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Proveedor newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Proveedor query()
 * @method static \Illuminate\Database\Eloquent\Builder|Proveedor whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Proveedor whereDescripcion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Proveedor whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Proveedor whereNombreProveedor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Proveedor whereUpdatedAt($value)
 */
	class Proveedor extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Rack
 *
 * @property int $id
 * @property string $name_rack
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Rack newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Rack newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Rack query()
 * @method static \Illuminate\Database\Eloquent\Builder|Rack whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rack whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rack whereNombreRack($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rack whereUpdatedAt($value)
 */
	class Rack extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Rol
 *
 * @property int $id
 * @property string $name_rol
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Rol newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Rol newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Rol query()
 * @method static \Illuminate\Database\Eloquent\Builder|Rol whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rol whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rol whereNameRol($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rol whereUpdatedAt($value)
 */
	class Rol extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Status
 *
 * @property int $id
 * @property string $name_status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Status newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Status newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Status query()
 * @method static \Illuminate\Database\Eloquent\Builder|Status whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Status whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Status whereNombreStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Status whereUpdatedAt($value)
 */
	class Status extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Table
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Table newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Table newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Table query()
 * @method static \Illuminate\Database\Eloquent\Builder|Table whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Table whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Table whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Table whereUpdatedAt($value)
 */
	class Table extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Ticket
 *
 * @property int $id
 * @property string $total
 * @property string $subtotal
 * @property int $item_count
 * @property string $user_name
 * @property string $ticket_date
 * @property int $user_id
 * @property string $tax
 * @property string $discounts
 * @property string $tip
 * @property string $min_tip
 * @property string $table_name
 * @property int $table_id
 * @property string $status
 * @property int $closed
 * @property int $workshift_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\TicketDetail[] $Details
 * @property-read int|null $details_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Payment[] $payments
 * @property-read int|null $payments_count
 * @property-read \App\Models\Table|null $table
 * @property-read \App\Models\User|null $user
 * @property-read \App\Models\Workshift|null $workshift
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket query()
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereClosed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereDiscounts($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereItemCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereMinTip($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereSubtotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereTableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereTableName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereTax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereTicketDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereTip($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereUserName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereWorkshiftId($value)
 */
	class Ticket extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\TicketDetail
 *
 * @property int $id
 * @property int $units
 * @property string $unit_price
 * @property string $discounts
 * @property string $tax
 * @property string $subtotal
 * @property string $total
 * @property int $products_tbl_id
 * @property string $products_img
 * @property int $attended
 * @property int $ticket_id
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|TicketDetail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TicketDetail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TicketDetail query()
 * @method static \Illuminate\Database\Eloquent\Builder|TicketDetail whereProductsImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TicketDetail whereProductsTblId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TicketDetail whereAttended($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TicketDetail whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TicketDetail whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TicketDetail whereDiscounts($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TicketDetail whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TicketDetail whereSubtotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TicketDetail whereTax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TicketDetail whereTicketId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TicketDetail whereTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TicketDetail whereUnitPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TicketDetail whereUnits($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TicketDetail whereUpdatedAt($value)
 */
	class TicketDetail extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Tipo
 *
 * @property int $id
 * @property string $name_tipo
 * @property string|null $descripcion_tipo
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Tipo newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tipo newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tipo query()
 * @method static \Illuminate\Database\Eloquent\Builder|Tipo whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tipo whereDescripcionTipo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tipo whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tipo whereNombreTipo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tipo whereUpdatedAt($value)
 */
	class Tipo extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Crossbar
 *
 * @property int $id
 * @property string $name_crossbar
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Crossbar newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Crossbar newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Crossbar query()
 * @method static \Illuminate\Database\Eloquent\Builder|Crossbar whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Crossbar whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Crossbar whereNombreCrossbar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Crossbar whereUpdatedAt($value)
 */
	class Crossbar extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $password
 * @property string|null $two_factor_secret
 * @property string|null $two_factor_recovery_codes
 * @property string|null $remember_token
 * @property int|null $rol_id
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRolId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwoFactorRecoveryCodes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwoFactorSecret($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Workshift
 *
 * @property int $id
 * @property int $active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Workshift newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Workshift newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Workshift query()
 * @method static \Illuminate\Database\Eloquent\Builder|Workshift whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Workshift whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Workshift whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Workshift whereUpdatedAt($value)
 */
	class Workshift extends \Eloquent {}
}

