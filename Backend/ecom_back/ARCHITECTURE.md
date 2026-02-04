# 🛍️ Architecture E-Commerce MVP - Laravel avec UUID

## ✅ Migrations Créées

### 1️⃣ Tables Principales

#### **users** (0001_01_01_000000_create_users_table.php)
- `uuid id` (PK)
- `name`, `email` (unique), `phone` (unique)
- `password`, `email_verified_at`
- `is_active` (boolean)
- `remember_token`, `timestamps`

#### **permissions** (2026_02_04_104129_create_permission_tables.php)
- `uuid id` (PK)
- `name`, `guard_name`
- `timestamps`

#### **roles** (2026_02_04_104129_create_permission_tables.php)
- `uuid id` (PK)
- `name`, `guard_name`
- `timestamps`

#### **model_has_permissions** (2026_02_04_104129_create_permission_tables.php)
- `uuid permission_id` (FK)
- `uuid model_id`, `string model_type` (polymorphic)
- Composite PK

#### **model_has_roles** (2026_02_04_104129_create_permission_tables.php)
- `uuid role_id` (FK)
- `uuid model_id`, `string model_type` (polymorphic)
- Composite PK

#### **role_has_permissions** (2026_02_04_104129_create_permission_tables.php)
- `uuid permission_id` (FK)
- `uuid role_id` (FK)
- Composite PK

### 2️⃣ Tables E-Commerce

#### **categories** (2026_02_04_110001_create_categories_table.php)
- `uuid id` (PK)
- `name`, `slug` (unique)
- `is_active` (boolean)
- `timestamps`

#### **products** (2026_02_04_110002_create_products_table.php)
- `uuid id` (PK)
- `uuid category_id` (FK → categories)
- `name`, `slug` (unique), `price` (integer)
- **Stock intégré** : `stock_quantity`, `alert_threshold`
- `short_description` (text, nullable)
- `is_active` (boolean)
- `timestamps`

#### **product_images** (2026_02_04_110003_create_product_images_table.php)
- `uuid id` (PK)
- `uuid product_id` (FK → products, cascade on delete)
- `path` (string)
- `is_main` (boolean)
- `timestamps`

#### **orders** (2026_02_04_110004_create_orders_table.php)
- `uuid id` (PK)
- `uuid user_id` (FK → users, nullable, null on delete)
- `reference` (string, unique)
- `total_amount` (integer)
- `status` (enum: pending, confirmed, preparing, delivered, cancelled)
- `payment_method` (string, default: cash_on_delivery)
- `payment_confirmed` (boolean)
- `timestamps`

#### **order_items** (2026_02_04_110005_create_order_items_table.php)
- `uuid id` (PK)
- `uuid order_id` (FK → orders, cascade on delete)
- `uuid product_id` (FK → products, cascade on delete)
- `quantity`, `unit_price` (integer)
- `timestamps`

---

## 🏗️ Modèles Créés

### **User** (App\Models\User.php)
- ✅ `HasUuids`, `HasRoles`, `HasFactory`, `Notifiable`
- Fillable: `name`, `email`, `phone`, `password`, `is_active`
- Casts: `email_verified_at`, `password`, `is_active`

### **Role** & **Permission** (App\Models\)
- ✅ Modèles personnalisés avec `HasUuids`
- Extends Spatie models

### **Category** (App\Models\Category.php)
- ✅ `HasUuids`, `HasFactory`
- Relation: `hasMany(Product)`

### **Product** (App\Models\Product.php)
- ✅ `HasUuids`, `HasFactory`
- Relations: `belongsTo(Category)`, `hasMany(ProductImage)`
- Méthodes utiles:
  - `isInStock()`: Vérifie si en stock
  - `isLowStock()`: Vérifie si stock faible
  - `decreaseStock($qty)`: Diminue le stock
  - `increaseStock($qty)`: Augmente le stock

### **ProductImage** (App\Models\ProductImage.php)
- ✅ `HasUuids`, `HasFactory`
- Relation: `belongsTo(Product)`

### **Order** (App\Models\Order.php)
- ✅ `HasUuids`, `HasFactory`
- Relations: `belongsTo(User)`, `hasMany(OrderItem)`
- Méthodes utiles:
  - `generateReference()`: Génère référence unique
  - `isPending()`, `isConfirmed()`, `isDelivered()`, `isCancelled()`
  - `confirmPayment()`: Confirme paiement manuellement

### **OrderItem** (App\Models\OrderItem.php)
- ✅ `HasUuids`, `HasFactory`
- Relations: `belongsTo(Order)`, `belongsTo(Product)`
- Accessor: `getSubtotalAttribute()` (quantity × unit_price)

---

## 🎭 Rôles et Permissions (Seeder)

### **RolesAndPermissionsSeeder**

#### Permissions créées:
**Products:** `view-products`, `create-products`, `edit-products`, `delete-products`
**Categories:** `view-categories`, `create-categories`, `edit-categories`, `delete-categories`
**Orders:** `view-orders`, `create-orders`, `edit-orders`, `delete-orders`, `confirm-payment`
**Users:** `view-users`, `create-users`, `edit-users`, `delete-users`

#### Rôles créés:

1. **admin** → Toutes les permissions
2. **client** → `view-products`, `view-categories`, `create-orders`, `view-orders`
3. **livreur** → `view-orders`, `edit-orders`

---

## 📋 Instructions de Migration

### 1️⃣ Réinitialiser la base de données (si nécessaire)
```bash
php artisan migrate:fresh
```

### 2️⃣ Exécuter les migrations
```bash
php artisan migrate
```

### 3️⃣ Seed les rôles et permissions
```bash
php artisan db:seed --class=RolesAndPermissionsSeeder
```

### 4️⃣ (Optionnel) Créer un utilisateur admin
```php
$user = User::create([
    'name' => 'Admin User',
    'email' => 'admin@example.com',
    'phone' => '+243900000000',
    'password' => bcrypt('password'),
    'is_active' => true,
]);

$user->assignRole('admin');
```

---

## ⚙️ Configuration Spatie

Le fichier `config/permission.php` a été mis à jour:
- ✅ `teams` = `false` (pas de multi-tenancy)
- ✅ Modèles personnalisés: `App\Models\Permission`, `App\Models\Role`

---

## 🚀 Prochaines Étapes

1. **Créer les Controllers** pour Products, Categories, Orders
2. **Définir les Routes API** (routes/api.php)
3. **Implémenter l'authentification** (Laravel Sanctum)
4. **Créer les Resources** pour formater les réponses JSON
5. **Ajouter la validation** (Form Requests)
6. **Implémenter la logique de paiement** manuel
7. **Créer un dashboard admin** pour confirmer les paiements

---

## 📝 Notes Importantes

- ✅ **UUID partout** - Toutes les tables utilisent UUID comme clé primaire
- ✅ **Stock intégré** - Pas de table stock séparée
- ✅ **Paiement manuel** - L'admin confirme via `payment_confirmed`
- ✅ **Pas d'interface livreur** - Rôle préparé mais pas d'API dédiée
- ✅ **Architecture propre** - Séparation claire des responsabilités
- ✅ **Scalable** - Facilement extensible pour de nouvelles fonctionnalités

---

## 🔗 Relations Importantes

```
User (1) ←→ (N) Order ←→ (N) OrderItem ←→ (1) Product
Category (1) ←→ (N) Product ←→ (N) ProductImage
User (N) ←→ (N) Role ←→ (N) Permission
```

---

**Architecture prête pour production MVP ! 🎉**
