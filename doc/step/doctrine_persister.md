#### Darkilliant\ImportBundle\Step\DoctrinePersisterStep 

##### Rôle 

persister une entité doctrine en bdd

##### Options

| Nom             | Description                                               |
|-----------------|-----------------------------------------------------------|
| batch_count     | valeur à passer à ProcessState::setData(...)              |
| whitelist_clear | type d'entités à déclacher de doctrine après chaque flush |

##### Examples

```yaml
service: 'Darkilliant\ImportBundle\Step\DoctrinePersisterStep'
options:
    batch_count: 20
    whitelist_clear: ['AppBundle\Entity\Product']
```